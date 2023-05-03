<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Http\Resources\CommunityShowResource;
use App\Http\Resources\PostListResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug){
        $community =Community::where('slug',$slug)->firstOrFail();

        $posts =CommunityPostResource::collection($community->posts()->where('user_id',$community->user_id)->with(['user','postVotes' => function($query){
            $query->where('user_id',auth()->id());
        }])->withCount('comments')->paginate(2)); // in with value is (user model) relation ship
        // and than 'postVotes' is will go to CommunityPostResource'

        $communities =CommunityShowResource::collection($community->withCount('posts')->latest()->take(4)->get());



        return Inertia::render('Frontend/Community/Show',compact('community','posts','communities'));
    }
}

