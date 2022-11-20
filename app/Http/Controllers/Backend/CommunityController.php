<?php

namespace App\Http\Controllers\Backend;



use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities =Community::all();
        return Inertia::render("Communities/Index",compact("communities"));//compact is like a props
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() ///user this (create()) method when you call route path
    {
        return Inertia::render("Communities/Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunityStoreRequest $request) // communityStoreRequest is for this
    {
        Community::create($request->validated() + ["user_id"=>auth()->id()]);
        return to_route("communities.index")->with(["message" =>"Your Community had been Created!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community) //this mean Community model ထဲ က fillable လုပ် ထားတဲ့ ကောင် ကို လှမ်း you တာ ပါ။
    {



         return Inertia::render("Communities/Edit",compact('community'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommunityStoreRequest $request, Community $community)
    {
    // this is important code when you update community//////////
        $community->update($request->validated());
        return to_route("communities.index")->with(["message" =>"Your Community has been Updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
         $community->delete();
         return back()->with(["message" =>"Your Community has been Deleted!"])->with(["massage" =>"Your Community has been Updated!"]);
    }
}
