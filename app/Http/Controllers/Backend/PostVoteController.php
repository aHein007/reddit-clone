<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostVote;

class PostVoteController extends Controller
{
    public function upVote(Post $post){
        $isVoted = PostVote::where('post_id',$post->id)
                            ->where('user_id',auth()->id())
                            ->first();

        if(!is_null($isVoted)){
            if($isVoted->vote === -1){
                $isVoted->update([
                    'vote' => 1
                ]);
                $post->increment('vote',2); // this is add 2 in post vote
                return redirect()->back();
               }elseif($isVoted->vote === 1){
                 return redirect()->back();
               }
        }else{
            PostVote::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'vote' => 1
           ]);
           $post->increment('vote',1);
           return redirect()->back();
        }
    }

    public function downVote(Post $post){
       $isVoted =PostVote::where('post_id',$post->id)
                          ->where('user_id',auth()->id())
                          ->first();

            if(is_null($isVoted)){
                PostVote::create([
                    'user_id' => auth()->id(),
                    'post_id' => $post->id,
                    'vote' => -1
                ]);
                $post->decrement('vote',1);
                return redirect()->back();
            }else{
                if($isVoted->vote === 1){
                    $isVoted->update([
                        'vote' => -1  // show
                    ]);

                    $post->decrement('vote',1); // total many vote in post table (0 , 1 )
                    return redirect()->back();
                }elseif($isVoted === -1){
                    return redirect()->back();
                }
            }
    }
}
