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
            'created_at' => (string) $this->created_at,
            'favorites' => $this->favorites,
            'views' => $this->views,
            'likes' => $this->likes,
            'is_liked' => $this->is_liked,
            'user' => $this->user,
            'post_img' => PostImgResource::collection($this->post_img),
            'tags' => TagResource::collection($this->tag),
        ];
    }
}
