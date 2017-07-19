<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Slot;
use App\Location;
use App\Schedule;
use App\Timeslot;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReservationsController extends Controller
{
    public function show()
    {
    	$user = Auth::user();

    	return view('profile', compact('user'));
    }

    public function delete(Reservation $reservation)
    {
    	$reservation->delete();

    	return back();
    }

    public function view()
    {
        return view('reserve');
    }

    public function selectDate($selected_dates)
    {
        $dates = explode(",", $selected_dates);

        $schedule_ids = array();
        $slots = array();

        foreach($dates as $date) {
            //gets all the schedule_ids
            $filtered_schedules = Slot::where('date_slots', $date)
                                    ->join('schedules', 'schedules.id', '=', 'slots.schedule_id')
                                    ->get(['schedules.id AS schedule_id']);
            
            //saves all schedule_ids in an array of values
            foreach($filtered_schedules as $filtered_schedule){
                $all_schedule_ids[] = $filtered_schedule -> schedule_id;
            }
        }

        //if the schedule_id frequency == slots queried, add to schedule_ids
        $schedules_count = array_count_values($all_schedule_ids);
        foreach($schedules_count as $key => $count){
            if (count($dates) == $count){
                $schedule_ids[] = ($key);
            }
        }

        foreach($schedule_ids as $schedule_id){        
            $filtered_slots = Slot::where('date_slots', $date)
                                ->where('num_of_seats', '>', '0')
                                ->join('schedules', 'schedules.id', '=', 'slots.schedule_id')
                                ->join('timeslots', 'timeslots.id', '=', 'schedules.timeslot_id')
                                ->join('locations', 'locations.id', '=', 'schedules.location_id')
                                ->where('schedules.id', $schedule_id)
                                ->get(['locations.name AS location', 'timeslots.time_slot', 'slots.id AS slot_id', 'schedules.id AS schedule_id', 'locations.trip_type']);

            $slots[] = ($filtered_slots);    
        }

        return response()->json(['slots' => $slots, 'schedule_ids' => $schedule_ids]);
    }

    public function makeReservation(){

        //get authenticated user's id
        $user_id = Auth::id();

        //get comment
        $comment =  request()->comment;

        // get all the slots_id
        $dates = explode(",", request()->date_slots );
        $schedule_ids[] = request()->morning_schedule;
        $schedule_ids[] = request()->afternoon_schedule;

        foreach ($dates as $date){
            foreach($schedule_ids as $schedule_id){    
                $filtered_slots = Slot::where('date_slots', $date)
                                    ->where('num_of_seats', '>', '0')
                                    ->join('schedules', 'schedules.id', '=', 'slots.schedule_id')
                                    ->where('schedules.id', $schedule_id)
                                    ->get(['slots.id AS slot_id']);

                $reservation = array(
                    'user_id' => $user_id, 
                    'slot_id' => $filtered_slots[0] ->slot_id,
                    'comment' => $comment,
                );

                Reservation::create($reservation);
            }
        }   

        return back();
    }

    public function listReservations(){
        $slots = Slot::all();

        return view('admin.reservations', compact('slots'));
    }

    public function listDateReservations($date){

        $slots = Slot::where('date_slots', $date)
                    ->join('schedules', 'schedules.id', '=', 'slots.schedule_id')
                    ->join('reservations', 'reservations.slot_id', '=', 'slots.id')
                    ->join('locations', 'schedules.location_id', '=', 'locations.id')
                    ->join('timeslots', 'schedules.timeslot_id', '=', 'timeslots.id')
                    ->join('users', 'reservations.user_id', '=', 'users.id')
                    ->get(['locations.name AS location', 'timeslots.time_slot', 'users.first_name', 'users.last_name', 'users.mobile_number', 'reservations.id AS reservation_id']);

        return response()->json(['slots' => $slots]);
    }

    public function export($date){
        //$slots = Slot::where('date_slots', null)->get();

        Excel::create($date, function($excel) {
            $locations = Location::all();
        
            foreach($locations as $location){
                $excel->sheet($location->name, function($sheet){
                    $rows = Slot::where('date_slots', $date)
                                ->join('schedules', 'schedules.id', '=', 'slots.schedule_id')
                                ->join('reservations', 'reservations.slot_id', '=', 'slots.id')
                                ->join('locations', 'schedules.location_id', '=', 'locations.id')
                                ->join('timeslots', 'schedules.timeslot_id', '=', 'timeslots.id')
                                ->join('users', 'reservations.user_id', '=', 'users.id')
                                ->get(['timeslots.time_slot', 'users.first_name', 'users.last_name', 'users.mobile_number', 'reservations.id AS reservation_id']);
                    
                    for($i = 1; $i <= count($rows); $i++){
                        $sheet->row($i, array(
                            $rows[$i]->time_slot, $rows[$i]->first_name + " " + $rows[$i]->last_name, $rows[$i]->mobile_number, $rows[$i]->reservation_id
                        ));
                    }
                });
            }
        })->export('xls');
    }
}
