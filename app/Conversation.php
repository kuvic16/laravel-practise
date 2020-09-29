<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /**
     * The attributes that are mass assingable
     * 
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays
     * 
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types
     * 
     * @var array
     */
    protected $casts = [];

    /**
     * A conversation can have muliple replies
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * A conversation must belongs to a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Save the best reply id of the conversation
     * 
     * @param App\Reply $reply
     * 
     * @return void
     */
    public function set_best_reply(Reply $reply)
    {
        $this->best_reply_id = $reply->id;
        $this->save();
    }
}
