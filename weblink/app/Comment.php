<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'content', 'rating'
    ];

    /**
    * Get post for this comment
    */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
    * Get user of this comment
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
