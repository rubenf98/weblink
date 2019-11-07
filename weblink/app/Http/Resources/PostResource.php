<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'url' =>  $this->url,
            'rating' =>  $this->rating,
            'source' =>  $this->source,
            'created_at' => (string) $this->created_at,
            'user' => $this->user,
            'comment' => CommentResource::collection($this->comment),
            'post_img' => PostImgResource::collection($this->post_img),
            'tags' => TagResource::collection($this->tag),
        ];
    }
}
