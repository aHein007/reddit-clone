<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostListResource;
use App\Http\Resources\PostShowResource;

class PostDetailController extends Controller
{
    public function show($community_slug,$post_slug){
        $post =new PostShowResource(Post::with(['comments','postVotes' => function($query){
            $query->where('user_id',auth()->id());
        }])->where('slug',$post_slug)->first());// with it mean ('comments') table is relation with post table

        $communitySlug =Community::where('slug',$community_slug)->first();

        $posts = PostListResource::collection($communitySlug->posts()->orderBy('vote','desc')->take(6)->get());

        return Inertia::render('Frontend/Post/PostDetailShow',compact('post','communitySlug','posts'));
    }


}
