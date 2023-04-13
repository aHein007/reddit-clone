<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Community extends Model
{
    use HasFactory,Sluggable;

    protected $fillable=[
        'user_id',
        'name',
        'slug',
        'description'
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(){
         return $this->hasMany(Post::class);// one-to-many relationship. post table can make relation with any table
    }


}
