<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Post;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $table = 'likeables';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    /**
     * Get all of the comments that are assigned this like.
     */
    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'likeable');
    }

    /**
     * Get all of the posts that are assigned this like.
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'likeable');
    }

    public static function handleLike($type, $id)
    {
        $like = Like::withTrashed()->where('likeable_type', $type)->where('likeable_id', $id)->where('user_id', Auth::id())->first();

        if (is_null($like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
            if ($type == 'App\Post') {
                Tag::UpdateLikes($id, "increment");
            }
        } else {
            if (is_null($like->deleted_at)) {
                $like->delete();
                Tag::UpdateLikes($id, "decrement");
            } else {
                $like->restore();
                Tag::UpdateLikes($id, "increment");
            }
        }
    }
}
