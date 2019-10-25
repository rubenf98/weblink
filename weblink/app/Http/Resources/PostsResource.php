<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' =>  $this->title,
            'description' =>  $this->description,
            'rating' =>  $this->rating,
            'created_at' => (string) $this->created_at,
            'comment' => CommentResource::collection($this->comment),
            'favorites' => $this->favorites,
            'user' => $this->user,
            'post_img' => PostImgResource::collection($this->comment),
            'tags' => TagResource::collection($this->tag), 
            //'post_has_tag' => PostHasTagResource::collection($this->post_has_tag),
        ];
    }
}
