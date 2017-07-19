<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{   
	public function timeslot(){

		return $this->belongsTo(TimeSlot::class);
	}

	public function location(){
		
		return $this->belongsTo(Location::class);
	}

}
