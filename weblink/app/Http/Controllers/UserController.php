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

        if($id == $user->id)
        {
            return view('profile.self')->with('userInfo',$user);
        }
        else{
            return view('profile.visit')->with('userInfo', new UserResource(User::find($id)));
        }
    }
}
