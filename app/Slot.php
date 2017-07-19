<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public $timestamps = false;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schedule_id','date_slots','num_of_seats',
    ];


    public function reservations(){
    	return $this->hasMany(Reservation::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

}
