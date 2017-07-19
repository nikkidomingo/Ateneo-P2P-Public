<?php

namespace App\Http\Controllers;

use DB;
use App\Contact;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests;

class ContactsController extends Controller
{
    public function index(){
    	$contacts = Contact::all();

        return view('contact', compact('contacts'));
    }


}
