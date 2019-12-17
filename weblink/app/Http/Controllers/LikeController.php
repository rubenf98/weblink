<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function likePost($id)
    {
        if (Auth::user()) {
            return Like::handleLike('App\Post', $id);
        } else {
            session()->flash('status', 'Unauthorized');
            return session('status');
        }
    }

    public function likeComment($id)
    {
        if (Auth::user()) {
            Like::handleLike('App\Comment', $id);
        } else {
            session()->flash('status', 'Unauthorized');
            return session('status');
        }
    }
}
