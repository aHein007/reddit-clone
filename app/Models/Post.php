<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory ,Sluggable; //this is useage for sluggable
    protected $fillable =[
        "community_id",
        "user_id",
        "title",
        "url",
        "slug",
        "description"
    ];

    public function sluggable(): array //this is useage for sluggable
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
