<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/home','testController@home');
//
Route::get('about','testController@about');

//user Routes
Route::resource('user','UsersController');
Route::get('/user/{id}/delete','UsersController@destroy');

//Company Routes
Route::get('company_per/cont/{id}','CompaniesController@addPercentage');
Route::post('company_per/cont/{id}','CompaniesController@storePercentage');
Route::resource('company','CompaniesController');

//loan Routes
Route::resource('loan','LoanController');

//loanPayment Routes
Route::resource('loan_payment','LoanPaymentController');

// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//ResetPassword
//Route::controllers(['password'=>'Auth\PasswordController']);
