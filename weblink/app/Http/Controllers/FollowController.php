<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        Follow::insert(['follower' => Auth::user()->id, 'followed' => $id]);

        return redirect('user/'.$id);
    }

    public function unfollow($id)
    {
        Follow::where([
            ['follower', Auth::user()->id],
            ['followed', $id],
        ])->delete();

        return redirect('user/'.$id);
    }
}
