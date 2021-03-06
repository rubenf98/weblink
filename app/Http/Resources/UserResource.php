<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
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
            'name' =>  $this->name,
            'email' =>  $this->email,
            'image' =>  $this->image,
            'role' =>  $this->role,
            'points' => $this->points,
            'b_day' =>  $this->b_day,
            'age' => $this->age,
            'gender' =>  $this->gender,
            'description' =>  $this->description,
            'country' =>  $this->country,
            'created_at' => (string) $this->created_at,
            'post' => UserPostsResource::collection($this->post),
        ];
    }
}