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
            
            $img = Image::make($principal_img);
            $img->crop(1920, 850)->save(public_path('/img/rotador-principal/' . $filename));
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
        if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1){
            return redirect('/profile/administracion')->with('slider', 'Rotador principal creado con exito, proceda a realizar el pago para así activar el anuncio.');
        }else{
            return redirect('/profile')->with('slider', 'Rotador principal creado con exito, proceda a realizar el pago para así activar el anuncio.');
        }
        
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
    public function detalleRotadorPrincipal($id)
    {
        $info = Slideshow::where('id', $id)->first();
        $secondary_photos = Photo::where('slideshow_id', $id)->get();
        return view('sections.detalle-publicaciones.rotador-principal',compact('info', 'secondary_photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        

        $hasImage =   Slideshow::where('id', $id)->select('principal_img')->first();
        $ImageRoute = public_path('/img/profiles/' . $hasImage->principal_img);

        if($request->file('principal_img')) 
        {
            $profile_img = $request->file('principal_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();

            if($filename != $hasImage->principal_img){
                if(\File::exists(public_path('/img/rotador-principal/' . $hasImage->principal_img)))
                {
                    \File::delete(public_path('/img/rotador-principal/' . $hasImage->principal_img));
                }
            }

            Image::make($profile_img)
            ->crop(1920,850)
            ->save(public_path('/img/rotador-principal/' . $filename));

            $user = Slideshow::where('id', $id)->first();
            //return $user;
            $user->principal_img = $filename;
            $user->save();
        }

        $slider =  Slideshow::where('id', $id)->first();
        $slider->title = $request->input('title');
        $slider->category_id = $request->input('category_id');
        $slider->city_id = $request->input('city_id');
        $slider->phone = $request->input('phone'); 
        $slider->mail = $request->input('mail'); 
        $slider->langues = $request->input('langues');
        $slider->description = $request->input('description');
        $slider->save();


        if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1){
            return redirect('/profile/administracion')->with('slider', 'Información actualizada con éxito!!!');
        }else{
            return redirect('/profile')->with('slider', 'Información actualizada con éxito!!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activarRotadorPrincipal(Request $request, $id)
    {
        $Activarslider =  Slideshow::where('id', $id)->first();
        $Activarslider->status = '1';
        $Activarslider->time_activated = date("Y-m-d H:i:s");
        $Activarslider->publish_date = date("Y-m-d H:i:s");
        $Activarslider->save();

        return redirect('/profile/administracion')->with('slider', 'Se ha activado la publicación con referencia '. $id . ' exitosamente!!'); 
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
