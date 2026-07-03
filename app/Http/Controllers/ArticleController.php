<?php

namespace App\Http\Controllers;

use App\Actions\Articles\CreateNewArticle;
use App\Actions\Tags\CreateNewTag;
use App\Enums\ArticleStatus;
use App\Enums\ResponseStatus;
use App\Events\ArticleViewed;
use App\Http\Requests\AutoSaveArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Throwable;

class ArticleController extends Controller
{
    public function __construct(protected ArticleService $articleService) {}

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
        $statuses = ArticleStatus::cases();
        $tags = Tag::all();

        return view('dashboard.articles.editor', compact('categories', 'statuses', 'tags'));
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
            'status' => $request->input('status'),
            'user_id' => auth()->id(),
            'published_at' => $request->input('published_at'),
            'cover_image' => $request->file('cover_image'),
            'tags' => $request->array('tags'),
        ];
        try {
            $this->articleService->create($data);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create article: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('dashboard.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::published()->where('slug', '=', $slug)->firstOrFail();
        $article->load('category', 'tags');
        ArticleViewed::dispatch($article);
        return view('public.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::with('tags')->ownedByAuth()->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        $statuses = ArticleStatus::cases();
        return view('dashboard.articles.editor', compact('article', 'statuses', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->articleService->update($request->validated(), $article->id);

        return redirect()->route('dashboard.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::ownedByAuth()->findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }

    public function publish(string $id)
    {
        try {
            $article = Article::ownedByAuth()->findOrFail($id);
            $article->publish();
            return redirect()->route('dashboard.drafts')->with('success', 'Article published successfully.');
        } catch (Throwable $err) {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function unpublish(string $id)
    {
        try {
            $article = Article::ownedByAuth()->findOrFail($id);
            $article->unpublish();
            return redirect()->route('dashboard.drafts')->with('success', 'Article moved back to drafts.');
        } catch (Throwable $err) {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function like(Article $article)
    {
        try {
            $this->articleService->like($article, auth()->user());
            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully liked the article.', [], ['count' => Number::abbreviate($article->likes_count)]);
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }

    public function unLike(Article $article)
    {
        try {
            $this->articleService->unLike($article, auth()->user());
            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully unliked the article.', [], ['count' => Number::abbreviate($article->likes_count)]);
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }

    public function bookmark(Article $article)
    {
        try {
            $this->articleService->bookmark($article, auth()->user());
            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully bookmarked the article.', [], ['count' => Number::abbreviate($article->bookmarks_count)]);
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }

    public function unBookmark(Article $article)
    {
        try {
            $this->articleService->unBookmark($article, auth()->user());
            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully unbookmark the article.', [], ['count' => Number::abbreviate($article->bookmarks_count)]);
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }

    public function comments(Article $article)
    {
        $comments = $article->comments()->latest()->get();
        $commentsView = view('public.articles.partials.comments-list', compact('comments'))->render();
        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully fetch the article comments.', [], ['comments' => $commentsView]);
    }

    public function newAutoSave(AutoSaveArticleRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $article =  $this->articleService->create($data);
            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully auto save the article.', [], ['article_id' => $article->id]);
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }

    public function autoSave(AutoSaveArticleRequest $request, Article $article)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $article =  $this->articleService->autosave($data, $article->id);
            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully auto save the article.', [], ['article_id' => $article->id]);
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }

    public function preview(Article $article)
    {
        $article->load('category', 'tags');
        return view('public.articles.preview', compact('article'));
    }
}
