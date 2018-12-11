<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use App\Slideshow;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->hasFile('principal_img')) 
        {
            $principal_img = $request->file('principal_img');
            $filename = time() . '.' . $principal_img->getClientOriginalExtension();
            
            Image::make($principal_img)
            ->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/img/rotador-principal/' . $filename));
        }

        $data = [];

        $data = Slideshow::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'city_id' => $request->input('city_id'),
            'phone' => $request->input('phone'), 
            'mail' => $request->input('mail'), 
            'langues' => $request->input('langues'),
            'description' => $request->input('description'),
            'creation_date' => date("Y-m-d H:i:s"),
            'principal_img' => $filename,
        ]);

        if($request->hasFile('secondary_img')) 
        {
            // getting all of the post data
            $files = $request->file('secondary_img');
            $destinationPath = public_path('/img/rotador-principal/imagenes_secundarias/');
            
            // recorremos cada archivo y lo subimos individualmente
            foreach($files as $file) {
                
                $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
                $filename = $data->id."-".$random_number.time().'.'.$file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath,$filename);

                $img_data = [];
                $img_data = Photo::create([
                    'slideshow_id' => $data->id,
                    'img' => $filename,
                ]);
            }
        }
        return redirect('/profile')->with('slider', 'Rotador principal creado con exito, proceda a realizar el pago para así activar el anuncio.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
