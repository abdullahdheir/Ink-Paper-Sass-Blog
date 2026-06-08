<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withCount('posts')->with('reach')->paginate(5);
        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:160|unique:tags,slug,NULL,NULL,user_id,' . auth()->id(),
            'description' => 'nullable|string',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        // Create tag reach record
        $tag->reach()->create([
            'total_view' => 0,
            'status' => 'active',
        ]);

        return redirect()->route('manage.tags')
            ->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $tag->load('posts', 'reach');
        return view('dashboard.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:160|unique:tags,slug,' . $tag->id . ',id,user_id,' . auth()->id(),
            'description' => 'nullable|string',
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        return redirect()->route('manage.tags')
            ->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('manage.tags')
            ->with('success', 'Tag deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $tags = Tag::where('user_id', auth()->id())->where('name', 'LIKE', "%{$query}%")->get();
        return response()->json($tags);
    }
}
