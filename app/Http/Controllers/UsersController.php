<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UsersController extends Controller
{
    public function index()
    {

    	$users = User::all();

    	return view('users.index', compact('users'));
    }

}
