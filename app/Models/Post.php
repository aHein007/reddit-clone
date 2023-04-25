<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory ,Sluggable;
    protected $fillable =[
        'community_id',
        'user_id',
        'title',
        'url',
        'slug',
        'description',
        'vote'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){ // no s
     return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function community(){
        return $this->belongsTo(Community::class);
    }

    public function postVotes()
    {
        return $this->hasMany(PostVote::class);
    }

}
