<?php

namespace App\Http\Controllers;

use DB;
use App\Announcement;
use App\Schedule;
use App\Location;
use App\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        $locations = Location::all();
        $schedules = Schedule::all();

        if (Auth::user()->is_admin == 1){

            return view('admin.home', compact('announcements', 'schedules', 'locations'));

        } else {

            return view('home', compact('announcements', 'schedules', 'locations'));
        }
    }
}
