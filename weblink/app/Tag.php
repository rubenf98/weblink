<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
    * Get user for this post
    */
    public function post()
    {
        return $this->belongsToMany('App\Post', 'posts_tags');
    }
}
