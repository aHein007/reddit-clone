<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Redirect;

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

    public function edit(Community $community,Post $post){

       return Inertia::render('Community/Post/PostEdit',compact('community','post'));
    }

    public function update(StorePostRequest $request,Community $community,Post $post ){
        $post->update($request->validated());

        return Redirect::route('frontend.post.show',[$community->slug,$post->slug]);
    }

    public function destroy(Community $community,Post $post){
        $post->delete();

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
