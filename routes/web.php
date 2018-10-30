<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Admin route

//Front route
Route::get('/home', 'HomeController@index');
Route::get('/login', 'SessionController@index');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/register', 'RegistrationController@index');
Route::post('/register', 'RegistrationController@store');
Route::get('/shop', 'ShopController@index');
Route::get('/contact', 'ContactController@index');
Route::get('/about', 'AboutController@index');
