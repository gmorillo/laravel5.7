<?php
use App\Slideshow;
use App\Category;

use Illuminate\Support\Facades\Input;

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/', 'HomeController@getSliders')->name('sliderinfo');
Route::resource('/task', 'TaskController')->middleware('verified');


Route::prefix('profile')->group(
    function () {
    	Route::get('/', 'UserController@profile_img')->middleware('verified');
		Route::post('/', 'UserController@updateProfileImg')->middleware('verified');
		Route::get('/', 'FormsController@getFormsInfo')->middleware('verified');
        Route::post('/create-slider', 'SliderController@create')->middleware('verified');
        Route::get('/anuncios-activos', 'SliderController@getListSliderActive')->middleware('verified');
        Route::get('/anuncios-caducados', 'SliderController@getListSliderInactive')->middleware('verified');
        Route::get('/editar-rotador-principal/{id}', 'SliderController@getRotadorData')->middleware('verified');
        Route::get('/rebuy/{id}', 'SliderController@volverAcomprar')->middleware('verified');
        Route::prefix('/administracion')->group(
            function () {
                Route::get('/', 'AdminController@getNewPublishData')->middleware('verified');
                Route::get('/editar-rotador-principal/{id}', 'AdminController@getRotadorData')->middleware('verified');
                Route::post('/edit-slider/{id}', 'SliderController@edit')->middleware('verified');
                Route::get('/activar-publicacion/{id}', 'SliderController@activarPublicacion')->middleware('verified');
                Route::get('/eliminar-publicidad/{id}', 'SliderController@delete')->middleware('verified');

            }
        );
    }
);

Route::prefix('detalle')->group(
    function () {
        Route::get('/anuncios/{id}', 'SliderController@detalleRotadorPrincipal');
    }
);



Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $search = Slideshow::where('title','LIKE','%'.$q.'%')
                        ->join ('cities', 'slideshows.city_id' , '=', 'cities.id')
                        ->join ('categories', 'slideshows.category_id' , '=', 'categories.id')
                        ->where('status',1)
                        ->orWhere('description','LIKE','%'.$q.'%')
                        ->orWhere('categories.name','LIKE','%'.$q.'%')
                        ->orWhere('cities.name','LIKE','%'.$q.'%')
                        ->orWhere('langues','LIKE','%'.$q.'%')
                        ->paginate(50);

    if(count($search) > 0)
        return view('sections.home.filterbar.resultado')->withDetails($search)->withQuery($q);
    else 
        return view ('sections.home.filterbar.resultado')->withDetails($search)->withQuery($q)->withMessage('No existe ningun elemento que coincida con tu búsqueda, porfavor realiza una nueva búsqueda!');
});


Route::get('/listado-por-categoria/{id}', 'HomeController@getAnuncioPorCategoria')->name('anunciosPorCategoria');
Route::get('/listado-por-ciudad/{id}', 'HomeController@getAnuncioPorCiudad')->name('anunciosPorCiudad');


