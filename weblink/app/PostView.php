<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Auth;

class PostView extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id'
    ];

    /**
     * Get post for this view
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Get user of this view
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function incrementViews($post_id)
    {
        $user = Auth::user();
        if ($user) {
            $row = PostView::where('user_id', $user->id)->where('post_id', $post_id);
            $last_day = Carbon::now()->subDay();

            //If user visited this post already
            if ($row->count() > 0) {

                //If user visited the page in the previous 24h
                if ($row->where('created_at', '>=', $last_day)->latest()->first() == null) {
                    //Create new record
                    PostView::createRecord($user->id, $post_id);
                }
            } else {
                //Create new record
                PostView::createRecord($user->id, $post_id);
            }
        }
    }

    public static function createRecord($user, $post)
    {
        $insert = new PostView;
        $insert->user_id = $user;
        $insert->post_id = $post;
        $insert->save();
    }
}
