<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    //
    public function show($id)
    {
        $user= Auth::user();
        if (User::find($id)) {
            //return new UserResource(User::find($id));
            return view('users.show')->with('user', new UserResource(User::find($id)));
        } else {
            return 'Error';
        }
    }
}