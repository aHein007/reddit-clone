<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    public function show($community_slug,$post_slug){
        dd($community_slug,$post_slug);
    }
}
