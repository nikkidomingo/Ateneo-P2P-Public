<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    public $timestamps = false;

    public function slots(){
    	return $this->hasMany(Slot::class);
    }

    public function schedules(){
    	return $this->hasMany(Schedule::class);
    }
}
