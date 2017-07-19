<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Announcement;
use Carbon\Carbon;
use App\Http\Requests;

class AnnouncementsController extends Controller
{
    public function add()
    {

        $announcement = array(
            'title' => request()->announcement_title, 
            'content' => request()->announcement_content,
        );

        Announcement::create($announcement);

        return back();
    }

    public function delete(Announcement $announcement)
    {
    	$announcement->delete();

    	return back();
    }
}
