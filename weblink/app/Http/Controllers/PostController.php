<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as IMG;
use Auth;
use App\Post;
use App\PostView;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return PostsResource::collection(Post::paginate(9));
        return view('posts.index')->with('posts', PostsResource::collection(Post::latest()->paginate(9)));
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
            'user_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'description' => 'required',
            'url' => 'nullable|string',
            'source' => 'nullable|string',
        ]);

        $filename = "/default.png";

        if ($request->file('image')->isValid()) {
            $image = $request->file('image');
            $filename = uniqid() . '.png';

            IMG::make($image)->encode('png', 65)->resize(760, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })->save(public_path('/images/website/' . $filename));
        }

        $post = new Request([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'source' => $request->source,
            'image' => '/images/website/' . $filename
        ]);

        Post::create($post->toArray());

        return redirect('/posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        PostView::incrementViews($id);
        //return new PostResource(Post::find($id));
        return view('posts.show')->with('post', new PostResource(Post::find($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
