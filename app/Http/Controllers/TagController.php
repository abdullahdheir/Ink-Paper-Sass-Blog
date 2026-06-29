<?php

namespace App\Http\Controllers;

use App\Actions\Tags\CreateNewTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withCount('articles')->with('reach')->paginate(5);
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

        $tag = CreateNewTag::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tags.index')
            ->with('success', 'Tag created successfully.');
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

        return redirect()->route('tags.index')
            ->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')
            ->with('success', 'Tag deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $tags = Tag::where('name', 'LIKE', "%{$query}%")->get();
        return response()->json($tags);
    }
}
