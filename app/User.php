<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function experience()
    {
        return $this->hasOne(Experience::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function projects()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * A user can have many conversations
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Assign role
     * 
     * @param \App\Role $role
     * 
     * @return boolean
     */
    public function assignRole($role)
    {
        $this->roles()->save($role);
    }
}
