<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Favorite;
use App\PostView;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'url', 'rating', 'source'
    ];

    protected $appends = ['comments', 'favourites', 'views'];

    public function getCommentsAttribute()
    {
        $nmr_comments = Comment::where('post_id', $this->attributes['id'])->count();
        return $nmr_comments;
    }

    public function getFavoritesAttribute()
    {
        $nmr_favourites = Favorite::where('post_id', $this->attributes['id'])->count();
        return $nmr_favourites;
    }

    public function getViewsAttribute()
    {
        $views = PostView::where('post_id', $this->attributes['id'])->count();
        return $views;
    }

    /**
     * Get user for this post
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get user for this post
     */
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get user for this post
     */
    public function favorites()
    {
        return $this->hasMany('App\Favorites');
    }

    /**
     * Get user for this post
     */
    public function post_img()
    {
        return $this->hasMany('App\PostImg');
    }

    /**
     * Get user for this post
     */
    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }

    /**
     * Get all views from this post
     */
    public function views()
    {
        return $this->hasMany('App\PostView');
    }
}
