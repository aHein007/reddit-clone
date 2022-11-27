<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunitiesController extends Controller
{
    public function show($slug){
        $community =Community::where("slug",$slug)->first();
        return Inertia::render("Frontend/Communities/Show",compact("community"));
    }
}
