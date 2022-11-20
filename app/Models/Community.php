<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory ,Sluggable;//this is useage for sluggable
    protected $fillable=[
        "user_id",
        "name",
        "description",
        "slug",

    ];

    public function sluggable(): array //this is useage for sluggable
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
