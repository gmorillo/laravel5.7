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
Route::get('/home', 'HomeController@getSliders')->name('sliderinfo')->middleware('verified');
Route::resource('/task', 'TaskController')->middleware('verified');


Route::prefix('profile')->group(
    function () {
    	Route::get('/', 'UserController@profile_img')->middleware('verified');
		Route::post('/', 'UserController@updateProfileImg')->middleware('verified');
		Route::get('/', 'FormsController@getFormsInfo')->middleware('verified');
        Route::post('/create-slider', 'SliderController@create')->middleware('verified');
        Route::prefix('/administracion')->group(
            function () {
                Route::get('/', 'AdminController@getNewPublishData')->middleware('verified');
                Route::get('/editar-rotador-principal/{id}', 'AdminController@getRotadorData')->middleware('verified');
                Route::post('/edit-slider/{id}', 'SliderController@edit')->middleware('verified');
            }
        );
    }
);

Route::prefix('rotador-principal')->group(
    function () {
    	
    }
);



