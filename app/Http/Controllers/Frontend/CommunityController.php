<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug){
        $community =Community::where('slug',$slug)->firstOrFail();

        $posts =CommunityPostResource::collection($community->posts()->where('user_id',$community->user_id)->with('user')->paginate(2));

        return Inertia::render('Frontend/Community/Show',compact('community','posts'));
    }
}

