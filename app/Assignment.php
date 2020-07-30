<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * Complete the assignment by saving completed as true
     * 
     * @return void
     */
    public function complete()
    {
        $this->completed = true;
        $this->save();
    }
}
