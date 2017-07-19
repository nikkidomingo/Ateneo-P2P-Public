<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Schedule;
use Illuminate\Http\Request;

use App\Http\Requests;

class SlotsController extends Controller
{
    
     public function view(){


    	$slots = Slot::all();

    	return view('admin.addslot', compact('slots'));
    }

    public function viewAdd(){


    	$schedules = Schedule::all();

    	return view('admin.addslot', compact('schedules'));
    }

    public function add(){

    	$selected_dates = request()->date_slots;
    	$dates = explode(",", $selected_dates);

    	$schedules = request()->schedules;

        $num_of_seats = request()->num_of_seats;

    	foreach ($dates as $date){
    		foreach ($schedules as $schedule){

    			$slot = array(
		            'schedule_id' => $schedule, 
		            'date_slots' => $date,
		            'num_of_seats' => $num_of_seats,
		        );

        		Slot::create($slot);
    		}
    	}

    	return back();
    }
}
