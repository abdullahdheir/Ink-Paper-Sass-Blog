<?php

namespace App\Http\Controllers;

use App\Actions\Articles\CreateNewArticle;
use App\Actions\Tags\CreateNewTag;
use App\Enums\ArticleStatus;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        return view('dashboard.articles.create', compact('categories', 'tags'));
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
            'published_at' => 'nullable|date',
        ]);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'status' => $request->input('draft') === 'on' ? ArticleStatus::DRAFT->value : ArticleStatus::PUBLISHED->value,
            'user_id' => auth()->id(),
            'published_at' => $request->input('published_at'),
            'cover_image' => $request->file('cover_image'),
            'tags' => $request->array('tags'),
        ];
        try {
            CreateNewArticle::create($data);
        } catch (\Exception $e) {

            return back()->withErrors(['error' => 'Failed to create article: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('dashboard.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('category')->findOrFail($id);
        return view('dashboard.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::with('tags')->findOrFail($id);
        $categories = Category::all();
        $tags = \App\Models\Tag::where('user_id', auth()->id())->get();
        return view('dashboard.articles.edit', compact('article', 'categories', 'tags'));
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

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);

        if ($request->hasFile('cover_image')) {
            $article->cover_image = $request->file('cover_image')->store('cover_images', 'public');
            $article->save();
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
                $article->tags()->sync($tagIds);
            }
        } else {
            $article->tags()->detach();
        }

        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
