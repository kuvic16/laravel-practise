<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $gaurded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }
}
