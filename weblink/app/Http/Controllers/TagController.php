<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Resources\TagResource;
use App\Http\Resources\TagDataResource;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags', TagResource::collection(Tag::all()));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAPI()
    {
        return TagResource::collection(Tag::all());
    }

    /**
     * Display a listing of the resource ordered by the most common
     *
     * @return \Illuminate\Http\Response
     */
    public function common()
    {
        return TagDataResource::collection(Tag::withCount('post')->orderBy('post_count', 'desc')->paginate(10));
    }

    /**
     * Update the specified resource number of clicks.
     *  
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function updateClicks(Tag $tag)
    {
        $tag->clicks++;
        $tag->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
