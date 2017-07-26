<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UsersController extends Controller {

    public function index(){

    	$users = User::all();

    	return view('users.index', compact('users'));

    }

     public function switchAdmin(){

        $user_id = Auth::User()->id;                       
        $user = User::find($user_id);

        if ($user->is_admin == 1){

            $user->is_admin = 0;
            $user->save();

        } else {

            $user->is_admin = 1;
            $user->save();

        }

        return redirect()->action('HomeController@index');
        
    }

}
