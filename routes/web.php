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

//Home Page 'Login'
Route::get('/', function () {
    return view('loginPage');
});

//Login Route
Route::get('/login', function () {
    return view('loginPage');
});

//Signup Route
Route::get('/signup', 'SignupController@makeSignupPage');

//Signup Route
Route::post('/signup/do', 'SignupController@doSignUp');
