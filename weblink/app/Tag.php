<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Cerbero\QueryFilters\FiltersRecords;

class Tag extends Model
{
    use FiltersRecords;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image'
    ];

    protected $appends = ['count'];

    public function getCountAttribute()
    {
        return $this->post()->count();
    }

    /**
     * Get user for this post
     */
    public function post()
    {
        return $this->belongsToMany('App\Post', 'posts_tags');
    }

    public static function UpdateLikes($post_id, $operation)
    {
        $post = Post::find($post_id);
        $tags = $post->tag;

        foreach ($tags as $tag) {
            $current_tag = Tag::find($tag->id);

            if ($operation == "increment")
                $current_tag->likes++;
            else if ($current_tag->likes > 0)
                $current_tag->likes--;

            $current_tag->save();
        }
    }

    public static function UpdateViews($post_id)
    {
        $post = Post::find($post_id);
        $tags = $post->tag;

        foreach ($tags as $tag) {
            $current_tag = Tag::find($tag->id);
            $current_tag->views++;
            $current_tag->save();
        }
    }
}
