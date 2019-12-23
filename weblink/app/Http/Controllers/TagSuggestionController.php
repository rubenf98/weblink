<?php

namespace App\Http\Controllers;

use App\TagSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TagsSuggestionsResource;
use App\QueryFilters\TagSuggestionFilters;

class TagSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = TagSuggestionFilters::hydrate($request->query());
        return view('tagsSuggestions.index')->with('suggestions', TagsSuggestionsResource::collection(TagSuggestion::filterBy($filters)->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|min:1',
        ]);

        $tag = new Request([
            'name' => $request->name,
            'description' => $request->description,
            'link' => $request->link,
            'email' => $request->email,
        ]);

        TagSuggestion::create($tag->toArray());
        $request->session()->flash('status', ['title' => "YESSS!", 'message' => 'Thank you for your suggestion!', 'class' => 'success']);
        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TagSuggestion  $tagSuggestion
     * @return \Illuminate\Http\Response
     */
    public function show(TagSuggestion $tagSuggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TagSuggestion  $tagSuggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(TagSuggestion $tagSuggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TagSuggestion  $tagSuggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TagSuggestion $tagSuggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TagSuggestion  $tagSuggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagSuggestion $tagSuggestion)
    {
        $tagSuggestion->delete();
        return response(null, 204);
    }
}
