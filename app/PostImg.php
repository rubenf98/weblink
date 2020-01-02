<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImg extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'post_id'
    ];

    /**
    * Get user for this post
    */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
