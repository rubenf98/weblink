<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Tag;

class TagDataResource extends JsonResource
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
            'name' => $this->name,
            'times_used' => $this->count,
            'total_clicks' => $this->clicks,
            'total_views' => $this->views,
            'total_likes' => $this->likes,
            'posts' => PostMinimalistResource::collection($this->post),
        ];
    }
}
