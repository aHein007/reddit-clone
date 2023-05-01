<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Http\Resources\CommunityShowResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomePageController extends Controller
{
    public function welcome(){

        $posts= CommunityPostResource::collection(Post::with(['user','community','postVotes' => function($query){
            $query->where('user_id',auth()->id());
        }])->withCount('comments')->orderBy('vote','desc')->take(12)->get());

        $communities =CommunityShowResource::collection(Community::withCount('posts')->orderBy('posts_count','desc')->take(6)->get()); // you need to add (posts_count) in s because is ordering

        return Inertia::render('Welcome' ,compact('posts','communities'));
    }
}
