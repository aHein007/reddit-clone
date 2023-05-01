<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'community_id'=> $this->community_id,
            'title' => $this->title,
            'description' => $this->description,
            'username' =>$this->user->username,
            'slug' => $this->slug,
            'url' => $this->url,
            'vote' => $this->vote,
            'owner' => auth()->id() == $this->user_id ? true : false, // current (user_id) and post table in (user_id) are same , it will return true (or) false
            'comments' => CommentShowResource::collection($this->whenLoaded('comments')), // this is important
            'postVotes' => $this->postVotes,

        ];
    }
}
