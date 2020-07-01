<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function like($user = null)
    {
        $user = $user ?: auth()->user();
        return $this->likes()->attach($user);
    }

    public function likes()
    {
        return $this->morphToMany(Users::class, 'likable')->withTimestamps();
    }
}
