<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Home and Contact Us
Route::get('/home', 'HomeController@index');
Route::get('/contactus', 'ContactsController@index');

//Profile
Route::get('/profile', 'ReservationsController@show');
Route::get('/profile/{reservation}', 'ReservationsController@delete');

//Reservation
Route::get('/reserve', 'ReservationsController@view');
Route::get('/reserve/dateselect/{selected_dates}', 'ReservationsController@selectDate');
Route::get('/reserve/location/{location}', 'ReservationsController@selectLocation');
Route::post('/reserve', 'ReservationsController@makeReservation');

//Register Routes
Auth::routes();
Route::get('/register/faculty', function() { return view('auth.faculty'); });
Route::get('/register/validate', 'Auth\RegisterController@chooseFaculty');
Route::get('/register/{user_type}', 'Auth\RegisterController@validateUser');
Route::get('/switch', 'UsersController@switchAdmin');

//Admin Routes
Route::get('/admin/home', 'HomeController@index') -> middleware('admin');
Route::get('/admin/home/announcement', 'AnnouncementsController@add') -> middleware('admin');
Route::get('/admin/home/{announcement}', 'AnnouncementsController@delete') -> middleware('admin');
// Route::get('/admin/home/schedules/edit', 'ScheduleController@viewEdit') -> middleware('admin');
// Route::post('/admin/home/schedules/edit', 'ScheduleController@edit') -> middleware('admin');

Route::get('/admin/reservations', 'ReservationsController@listReservations') -> middleware('admin');
Route::get('/admin/reservations/{date}', 'ReservationsController@listDateReservations') -> middleware('admin');
Route::get('/admin/reservations/delete/{reservation}', 'ReservationsController@delete') -> middleware('admin');
Route::get('/admin/slots', 'SlotsController@viewAdd') -> middleware('admin');
// Route::get('/admin/slots/add', 'SlotsController@viewAdd') -> middleware('admin');
Route::get('/admin/slots/add', 'SlotsController@add') -> middleware('admin');
// Route::get('/admin/editcontacts', 'HomeController@index') -> middleware('admin');