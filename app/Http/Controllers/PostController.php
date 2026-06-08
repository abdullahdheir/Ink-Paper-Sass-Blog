<?php

namespace App\Http\Controllers;

use App\Actions\Posts\CreateNewPost;
use App\Actions\Tags\CreateNewTag;
use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = \App\Models\Tag::where('user_id', auth()->id())->get();
        return view('dashboard.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => ['nullable', 'image', 'max:1024'],
            'tags' => 'nullable|array',
            'tags.*' => 'required|string|max:155',
            'draft' => 'sometimes|string|in:on,off',
        ]);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'status' => $request->input('draft') === 'on' ? PostStatus::DRAFT : PostStatus::PUBLISHED,
            'user_id' => auth()->id(),
            'cover_image' => $request->file('cover_image'),
        ];
        try {
            CreateNewPost::create($data);
        } catch (\Exception $e) {

            return back()->withErrors(['error' => 'Failed to create post: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('dashboard.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('category')->findOrFail($id);
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('tags')->findOrFail($id);
        $categories = Category::all();
        $tags = \App\Models\Tag::where('user_id', auth()->id())->get();
        return view('dashboard.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => ['nullable', 'image', 'max:1024'],
            'tags' => 'nullable|array',
            'tags.*' => 'required|string|max:155',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);

        if ($request->hasFile('cover_image')) {
            $post->cover_image = $request->file('cover_image')->store('cover_images', 'public');
            $post->save();
        }

        if ($request->filled('tags')) {
            $tagNames = $request->input('tags');
            if (!is_array($tagNames)) {
                $tagNames = explode(',', $tagNames);
            }

            $tagIds = [];

            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);

                if (!$tagName) continue;

                // Try to find existing tag by name
                $tag = Tag::where('name', '=', $tagName)->where('user_id', auth()->id())->first();

                if ($tag) {
                    $tagIds[] = $tag->id;
                } else {
                    // Create new tag
                    $newTag = CreateNewTag::create([
                        'name' => $tagName,
                        'user_id' => auth()->id(),
                        'description' => null,
                    ]);
                    $tagIds[] = $newTag->id;
                }
            }

            if (!empty($tagIds)) {
                $post->tags()->sync($tagIds);
            }
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
