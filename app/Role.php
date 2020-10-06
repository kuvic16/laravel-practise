<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $gaurded = [];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }
}
