<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('home');                   // Home page
});

Route::get('home', function () {

    return view('home');                   // Home page
});

Route::get('/registration', function () {
    return view('registration');              // Registration page
});

Route::get('login', function () {
    return view('login');
})->name('login');                              // Login page

Route::get('/logout', function () {
    session()->flush();
    return redirect('login');                        // Log out
});


Route::post("search_form","search@search")->name("search_form");          //search

Route::post("login_auth","login@login")->name("login_auth");       // Login Form


Route::get('/success', function () {                    // Success
    return view('success');
});


Route::post("registration_form","signup@registration")->name("registration_form"); // Registration form submit












   // --------------------------- Admin and users routes ------------




Route::get('user_home','login@user_home_func')->name('user_home');   // User home page

Route::get('admin_home','login@admin_home_func')->name('admin_home');   // Admin home page


Route::get('add_cars','admin_task@add_car_preload');


Route::post("add_car_data","admin_task@add_car_data")->name("add_car_data");       // Add car Form submit


Route::get('pending_requests','admin_task@pending_requests')->name("pending_requests");

Route::get('approve/{u_id}/{car_id}','admin_task@approve');  // registration approve


Route::get('cancel/{u_id}/{car_id}','admin_task@cancel');  // registration cancel


Route::get('registered_cars','admin_task@registered_cars')->name("registered_cars");


Route::get('delete/{u_id}/{car_id}','admin_task@delete');  // registration delete


Route::get('unregistered_cars','admin_task@unregistered_cars')->name("unregistered_cars");









Route::post("ajax_body_num","search@ajax_body_number")->name("ajax_body_num");













/*--------------------------------My Routes------------------------------------------*/



Route::get('/hash/{val}', 'login@hash_conv'); // For checking hash

Route::get('/session', function () {
    return session()->all();
});                                        // for checking the session values


