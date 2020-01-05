<?php

namespace App\Http\Controllers;

use App\TagSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TagsSuggestionsResource;
use App\QueryFilters\TagSuggestionFilters;
use Auth;
use App\User;

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
     * Display the specified resource.
     *
     * @param  \App\TagSuggestion  $tagSuggestion
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, TagSuggestion $tagSuggestion)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {

            if ($request->status == "approved")
                $tagSuggestion->status = "approved";
            else if ($request->status == "declined")
                $tagSuggestion->status = "declined";
            else {
                $tagSuggestion->status = "pending";
            }

            $tagSuggestion->save();
        } else {
            $request->session()->flash('status', ['title' => "Careful", 'message' => 'Only an admin can do this action!', 'class' => 'warning']);
        }

        return redirect('/dashboard/suggestions');
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
