<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	public $timestamps = false;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'slot_id', 'comment',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function slot(){
    	return $this->belongsTo(Slot::class);
    }
}
