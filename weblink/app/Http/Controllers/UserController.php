<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Http\Resources\TagsResource;
use App\Http\Resources\TagsSuggestionsResource;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\TagSuggestion;
use App\Tag;

class UserController extends Controller
{

    //
    public function admin()
    {
        return view('dashboard.dashboard')
        ->with('users', UsersResource::collection(User::all()))
        ->with('tags', TagsResource::collection(Tag::all()))
        ->with('suggestions', TagsSuggestionsResource::collection(TagSuggestion::all()));

        return UsersResource::collection(User::all());
    }

    //
    public function index()
    {
        return view('dashboard.users')->with('users', UsersResource::collection(User::all()));
    }

    //
    public function show($id)
    {
        $user = Auth::user();
        if (User::find($id)) {
            //return new UserResource(User::find($id));
            return view('users.show')->with('user', new UserResource(User::find($id)));
        } else {
            return 'Error';
        }
    }
}
