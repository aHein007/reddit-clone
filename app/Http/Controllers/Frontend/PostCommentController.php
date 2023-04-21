<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request ,$community_slug,Post $post){
        $postData =$this->commentStore($request,$post);

        $post->comments()->create($postData);

        return back();
    }

    private function commentStore($request,$post){
        return [
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'content' => $request->content
        ];
    }
}
