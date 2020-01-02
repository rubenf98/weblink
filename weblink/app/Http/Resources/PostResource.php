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
            'image' => $this->image,
            'source' =>  $this->source,
            'created_at' => (string) $this->created_at,
            'user' => $this->user,
            'comment' => CommentResource::collection($this->comment),
            'tags' => TagResource::collection($this->tag),
        ];
    }
}
