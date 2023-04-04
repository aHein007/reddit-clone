<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityStoreRequest;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $communities = Community::paginate(5)->through(fn($community)=>[// this is need when you make paginate with inertia.js
            'id' => $community->id,
            'name' => $community->name,
            'slug' => $community->slug,
            'created_at' => $community->created_at
       ]);
       return Inertia::render('Community/CommunityPage',compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Community/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityStoreRequest $request)
    {
        Community::create($request->validated() +
    [
        'user_id' =>Auth::user()->id
    ]);

        return to_route('communities.index')->with('message','Community created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {

        return Inertia::render('Community/CommunityEditPage',[
            'community' => $community
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunityStoreRequest $request, Community $community)
    {
        $community->update($request->validated());

        return to_route('communities.index')->with('message','Community updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
         $community->delete();

        return back()->with('deleteMessage','Community have been deleted!');
    }
}
