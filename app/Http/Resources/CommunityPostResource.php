<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityPostResource extends JsonResource
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
            'vote' => $this->vote,
            'postVotes' => $this->whenLoaded('postVotes'), // (whenLoaded) is when CommunityPostREsource is running it will for postVotes model
            //usually you want to use  model in this collection
            'community_slug' => $this->community->slug,
            'comments_count' => $this->comments_count,
            'created_at' => $this->created_at->diffForHumans(),// this is timing count method

        ];
    }
}
