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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::resource('/task', 'TaskController')->middleware('verified');


Route::prefix('profile')->group(
    function () {
    	Route::get('/', 'UserController@profile_img');
		Route::post('/', 'UserController@updateProfileImg');
		Route::get('/', 'FormsController@getFormsInfo');
		Route::post('/create-slider', 'SliderController@create');
    }
);

Route::prefix('rotador-principal')->group(
    function () {
    	
    }
);

