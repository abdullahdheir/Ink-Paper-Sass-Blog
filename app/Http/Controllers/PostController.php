<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('dashboard.posts.index', compact('posts'));
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
            'tags.*' => 'exists:tags,id',
            'draft' => 'sometimes|boolean',
        ]);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'status' => $request->boolean('draft', false) ? PostStatus::DRAFT : PostStatus::PUBLISHED,
            'user_id' => auth()->id(),
        ];
        DB::beginTransaction();
        try {
            $post = Post::create($data);

            if ($request->hasFile('cover_image')) {
                $post->cover_image = $request->file('cover_image')->store('cover_images', 'public');
                $post->save();
            }

            if ($request->filled('tags')) {
                $post->tags()->sync($request->input('tags'));
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to create post: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('posts.index')
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
            'tags.*' => 'exists:tags,id',
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
            $post->tags()->sync($request->input('tags'));
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
