<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function like($user = null)
    {
        $user = $user ?: auth()->user();
        return $this->likes()->attach($user);
    }

    public function likes()
    {
        return $this->belongsToMany(Users::class)->withTimestamps();
    }
}
