<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Auth;
use App\User;


class UserController extends Controller
{
    //
    public function index($id)
    {
        $user= Auth::user();

            //return new UserResource(User::find($id));
            return view('profile.profile')->with('user',new UserResource(User::find($id)));

    }
}
