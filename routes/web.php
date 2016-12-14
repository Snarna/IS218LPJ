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

/*
/Login Routes
*/

//Home Page 'Login'
Route::get('/', 'LoginController@makeLoginView');

//Login Route
Route::get('/login', 'LoginController@makeLoginView');

//Handle Login Authentication
Route::post('/login', 'LoginController@doLogin');


/*
/Logout Routes
*/
Route::get('/logout', 'LoginController@doLogout');



/*
/Signup Routes
*/

//Signup Route
Route::get('/signup', 'SignupController@makeSignupPage');

//Do Signup Route
Route::post('/signup/do', 'SignupController@doSignUp');

//Signup Success Route
Route::get('/signupsuccess', 'SignupController@makeSignupSuccessPage');



/*
/Service Routes
*/
//Home Page
Route::get('/home', 'HomeController@makeHomePage')->middleware('checkauth');

//Profile Page
Route::get('/profile', 'ProfileController@makeProfilePage')->middleware('checkauth');

/*
/Image Routes
*/
Route::get('/avatars/{filename}', 'ImageController@getImage')->middleware('checkauth');
