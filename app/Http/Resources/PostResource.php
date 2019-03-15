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
//        dd($this->user);
        return [
            'post_id'=>$this->id,
            'post_title'=>$this->title,
            'description'=>$this->description,
            'created_at'=>$this->created_at->toDateString(),
            'user'=>new UserResource($this->user),
    ];
    }
}
