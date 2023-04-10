<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CommunityPostController extends Controller
{
    public function create(Community $community){
        return Inertia::render('Community/Post/Create',compact('community'));
    }

    public function store(StorePostRequest $request,Community $community){
       $post = $this->getPostData($request,$community);

        $community->posts()->create($post);

        return redirect()->route('frontend.communities.show',$community->slug);
    }

    private function getPostData($request,$community){
        return [
            'user_id' => Auth::user()->id,
            'community_id' =>$community->id,
            'title'=> $request->title,
            'url'=>$request->url,
            'description' =>$request->description
        ];
    }
}
