<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Schedule;
use App\Announcement;
use App\Location;
use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{
	public function viewEdit(){

		$announcements = Announcement::all();
        $locations = Location::all();
        $schedules = Schedule::all();

        return view('admin.editschedules', compact('announcements', 'schedules', 'locations'));
	}

	public function edit(){

		$announcements = Announcement::all();
        $locations = Location::all();
        $schedules = Schedule::all();

        return view('admin.editschedules', compact('announcements', 'schedules', 'locations'));
	}
}
