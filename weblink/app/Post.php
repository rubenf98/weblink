<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cerbero\QueryFilters\FiltersRecords;
use App\Support\Collection;
use App\Comment;
use App\Favorite;
use App\PostView;
use Auth;

class Post extends Model
{
    use FiltersRecords;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'url', 'source', 'image'
    ];

    protected $appends = ['comments', 'favourites', 'views', 'is_liked', 'score'];

    public function getCommentsAttribute()
    {
        $nmr_comments = Comment::where('post_id', $this->attributes['id'])->count();
        return $nmr_comments;
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
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

    public function getScoreAttribute()
    {
        $favorites = $this->getFavoritesAttribute() * 7;
        $views = $this->getViewsAttribute() * 2;
        $comments = $this->getCommentsAttribute() * 3;
        $likes = $this->likes->count() * 5;
        return $favorites + $views + $comments + $likes;
    }

    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
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

    public static function order($filters, $order)
    {

        if (!$order || $order == 'new')
            return Post::filterBy($filters)->latest()->paginate(9);
        else if ($order == 'old')
            return Post::filterBy($filters)->oldest()->paginate(9);
        else if ($order == 'views')
            return Post::filterBy($filters)->withCount('views')->orderBy('views_count', 'desc')->latest()->paginate(9);
        else if ($order == 'comments')
            return Post::filterBy($filters)->withCount('comment')->orderBy('comment_count', 'desc')->latest()->paginate(9);
        else if ($order == 'likes')
            return Post::filterBy($filters)->withCount('likes')->orderBy('likes_count', 'desc')->latest()->paginate(9);
        else if ($order == 'hot') {
            //Create formula based on views, comments, favorites and likes and order based on latest
            $posts = Post::filterBy($filters)->latest()->get()->sortByDesc('score');
            return (new Collection($posts))->paginate(9);
        } else if ($order == 'best') {
            //Create formula based on views, comments, favorites and likes and order based on latest
            return Post::filterBy($filters)->get()->sortByDesc('score')->paginate(9);
        }
    }
}
