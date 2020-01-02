<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as IMG;
use Illuminate\Http\Request;

use App\Http\Resources\TagResource;
use App\Http\Resources\TagsResource;
use App\Http\Resources\TagDataResource;

use App\QueryFilters\TagFilters;

use App\Tag;

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
    public function dashboardIndex(Request $request)
    {
        $filters = TagFilters::hydrate($request->query());
        return view('tags.dashboard-index')->with('tags', TagsResource::collection(Tag::filterBy($filters)->get()));
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
    public function storeAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $image = "/default.png";

        if ($request->file('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $filename = uniqid() . '.png';

                IMG::make($image)->encode('png', 65)->resize(760, null, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->save(public_path('/images/tags/' . $filename));

                $image = '/images/tags/' . $filename;
            }
        }

        $tag = new Request([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        $inserted_tag = Tag::create($tag->toArray());

        return new TagResource($inserted_tag);
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
            'name' => 'required|string|max:100',
            'description' => 'required|min:10',
        ]);

        $image = "/default.png";

        if ($request->file('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $filename = uniqid() . '.png';

                IMG::make($image)->encode('png', 65)->resize(760, null, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->save(public_path('/images/tags/' . $filename));

                $image = '/images/tags/' . $filename;
            }
        }

        $tag = new Request([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        Tag::create($tag->toArray());

        $request->session()->flash('status', ['title' => "YESSS!", 'message' => 'Tag created with success!', 'class' => 'success']);
        return redirect('/dashboard/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
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
        $tag->name = $request->name;
        $tag->description = $request->description;

        $tag->save();

        $request->session()->flash('status', ['title' => "YESSS!", 'message' => 'Tag updated with success!', 'class' => 'success']);
        return redirect('/dashboard/tags');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function updateAPI(Request $request, Tag $tag)
    {

        $tag->name = $request->name;
        $tag->description = $request->description;

        $old_image = $tag->image;
        $new_image = "";

        if ($request->file('image')) {
            if ($request->file('image')->isValid()) {
                $new_image = $request->file('image');
                $filename = uniqid() . '.png';

                IMG::make($new_image)->encode('png', 65)->resize(760, null, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->save(public_path('/images/tags/' . $filename));

                if ($old_image != "/default.png") {
                    Storage::delete(public_path($old_image));
                }

                $new_image = '/images/tags/' . $filename;
            }
        }

        if ($new_image) {
            $tag->image = $new_image;
        }

        $tag->save();

        return new TagResource($tag);

        $request->session()->flash('status', ['title' => "YESSS!", 'message' => 'Tag updated with success!', 'class' => 'success']);
        return redirect('/dashboard/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response(null, 204);
    }
}
