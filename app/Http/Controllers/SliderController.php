<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Image;
use DB;
use App\User;
use App\Slideshow;
use App\Photo;
use App\City;
use App\Country;
use App\Category;
use App\Mail\nuevoAnuncio;
use App\Mail\nuevoAnuncioAdministrador;
use App\Mail\activarAnuncio;
use App\Mail\recompraAnuncio;


class SliderController extends Controller
{
    public function init()
    {
        date_default_timezone_set('America/Panama');
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
            
            $img = Image::make($principal_img);
            if($request->input('tipo_publicidad') == 1){
                $img->resize(1920, 750, 
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                )->insert(public_path('img/watermark.png'), 'center')->save(public_path('/img/rotador-principal/' . $filename));
            }elseif($request->input('tipo_publicidad') == 2 || $request->input('tipo_publicidad') == 3){
                $img->crop(616, 815)->insert(public_path('img/watermark.png'), 'center')->save(public_path('/img/rotador-principal/' . $filename));
            }
        }

        $data = [];

        $dates = $this->calculateDate($request->input('fecha'));

        $scheduleTime = $this->calculateSchedule($request);

        $finalPrice = $this->calculatePrice($dates, $scheduleTime);

        $data = Slideshow::create([
            'user_id' => Auth::user()->id,
            'publicity_type' => $request->input('tipo_publicidad'),
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'city_id' => $request->input('city_id'),
            'phone' => $request->input('phone'), 
            'mail' => $request->input('mail'), 
            'langues' => $request->input('langues'),
            'description' => $request->input('description'),
            'creation_date' => date("Y-m-d H:i:s"),
            'principal_img' => $filename,
            'schedule' => $scheduleTime,
            'publish_date' => $dates['publish_date'],
            'unpublish_date' => $dates['unpublish_date'],
            'price' => $finalPrice,
        ]);

        $this->secondaryImage($request, $data->id);

        if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1){
            return redirect('/profile/administracion')->with('slider', 'Anuncio creado con éxito, recuerda activar el anuncio con referencia: ' . $data->id . '');
        }else{
            $tipo_publicidad = $request->input('tipo_publicidad');
            $titulo = $request->input('title');
            $ciudad = City::where('id', $request->input('city_id'))->select('name')->first();
            $categoria = Category::where('id', $request->input('category_id'))->select('name')->first();
            $telefono = $request->input('phone');
            $mail = $request->input('mail');
            $idiomas = $request->input('langues');
            $desc = $request->input('description');
            $img = $filename;
            $referencia = $data->id;

            Mail::to(Auth::user()->email)->send(new nuevoAnuncio($tipo_publicidad, $titulo, $ciudad, $categoria, $telefono, $mail, $idiomas, $desc, $img, $referencia, $finalPrice));
            Mail::to('bembosex.com@bembosex.com')->send(new nuevoAnuncioAdministrador($tipo_publicidad, $titulo, $ciudad, $categoria, $telefono, $mail, $idiomas, $desc, $img, $referencia, $finalPrice));

            return redirect('/profile')->with('slider', 'Anuncio con referencia '. $data->id .' creado con exito, proceda a realizar el pago para así activar el anuncio. Recuerda revisar la bandeja de entrada o spam tu correo electrónico.');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListSliderActive(Request $request)
    {
        $data = Slideshow::where('user_id', Auth::getUser()->id)->where('status', 1)->paginate(15);
        $category = Category::get();
        $city = City::get();
        return view('sections.profile.anuncios-activos.main-anuncios-activos',compact('data', 'category', 'city'));
        //return redirect('/profile');

    }

    public function getListSliderInactive(Request $request)
    {
        $data = Slideshow::where('user_id', Auth::getUser()->id)->where('status', 0)->paginate(15);
        $category = Category::get();
        $city = City::get();
        $photos_slideshow = Photo::get();
        return view('sections.profile.anuncios-caducados.main-anuncios-caducados',compact('data', 'category', 'city', 'photos_slideshow'));
        //return redirect('/profile');

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
        $category = Category::get();
        $city = City::get();
        $secondary_photos = Photo::where('slideshow_id', $id)->get();
        return view('sections.detalle-publicaciones.rotador-principal',compact('info', 'secondary_photos', 'category', 'city'));
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
            //dd($request->input('publicity_type'));
            $img = Image::make($profile_img);
            if($request->input('publicity_type') == 1){
                $img->resize(1920, 750, 
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                )->insert(public_path('img/watermark.png'), 'center')->save(public_path('/img/rotador-principal/' . $filename));
            }elseif($request->input('publicity_type') == 2 || $request->input('publicity_type') == 3)
            {
                $img->crop(616, 815)->insert(public_path('img/watermark.png'), 'center')->save(public_path('/img/rotador-principal/' . $filename));
            }

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
    public function activarPublicacion (Request $request, $id)
    {
        $Activarslider =  Slideshow::where('id', $id)->first();
        $Activarslider->status = '1';
        $Activarslider->time_activated = date("Y-m-d H:i:s");

        if (date("Y-m-d H:i:s") > $Activarslider['publish_date']) {
            $diff = (integer)date_diff(date_create(date('Y-m-d',strtotime($Activarslider['publish_date']))), date_create(date('Y-m-d',strtotime($Activarslider['unpublish_date']))))->format('%a');
            $Activarslider->publish_date = date("Y-m-d H:i:s");
            $Activarslider->unpublish_date = date("Y-m-d H:i:s", strtotime('+'.$diff.' day', strtotime(date("Y-m-d H:i:s"))));
        }

        $Activarslider->created_at = now();
        $Activarslider->save();

        $fechaActivacion = $Activarslider->publish_date = date("d/m/Y");
        $referencia = $Activarslider->id;
        $price = $Activarslider->price;

        Mail::to($Activarslider->mail)->send(new activarAnuncio($fechaActivacion, $referencia, $price));
        return redirect('/profile/administracion')->with('slider', 'Se ha activado la publicación con referencia '. $id . ' exitosamente!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getRotadorData($id)
    {
        $city = City::get();
        $country = Country::get();
        $category = Category::get();
        $active_slideshow = Slideshow::where('id', $id)->orderBy('id', 'desc')->paginate(10);
        $photos_slideshow = Photo::where('slideshow_id', $id)->get();
        $list_per_user_slider = Slideshow::where('user_id', Auth::getUser()->id)->paginate(15);
        return view('sections.profile.editar-anuncios.editar-rotador-principal',compact('city','country', 'category', 'active_slideshow', 'photos_slideshow', 'list_per_user_slider'));
    }

    public function delete($id) {

        //para eliminar una única imágen
            $getPrincipalImageFile =   Slideshow::where('id', $id)->select('principal_img')->first();
            $getNamePrincipalImgFile = explode(",", $getPrincipalImageFile->principal_img);
            if(\File::exists(public_path('/img/rotador-principal/' . $getPrincipalImageFile->principal_img)))
            {
                \File::delete(public_path('/img/rotador-principal/' . $getPrincipalImageFile->principal_img));
            }
        //fin

        //para eliminar multiples imágenes
            $getSecondaryImageFile =   Photo::where('slideshow_id', $id)->select('img')->get();
            $getNameSecondaryImgFile = explode(",", $getSecondaryImageFile);
            
            foreach ($getSecondaryImageFile as $images) {
                \File::delete(public_path('/img/rotador-principal/imagenes_secundarias/' . $images->img));
            }
        //fin
    
        $deletePublicidadData = Slideshow::where('id', $id)->delete();
        $deletePhotosData = Photo::where('slideshow_id', $id)->delete();

        return redirect('/profile/administracion')->with('slider', 'Se ha eliminado el anuncio con referencia '. $id . ' exitosamente!!'); 
    }

    public function volverAcomprar($id)
    {
        $rebuy =  Slideshow::where('id', $id)->first();
        $rebuy->unpublish_date = NULL;
        $rebuy->created_at = now();
        $rebuy->save();

        $tipo_publicidad = $rebuy->publicity_type;
        $mail = $rebuy->mail;
        $telefono = $rebuy->phone;
        $referencia = $rebuy->id;

        Mail::to('bembosex.com@bembosex.com')->send(new recompraAnuncio($tipo_publicidad, $telefono, $mail, $referencia));

        return redirect('/profile/anuncios-caducados')->with('slider', 'Para proceder a la reactivación de este anuncio, deberá realizar el pago de la publicación. Pronto nuestro equipo se pondrá en contacto contigo. Su número de refencia del anuncio es: '. $id ); 
    }

    private function priceHour($type = 1)
    {
        $priceHour = DB::table('price_hour')
                ->select('price_hour.*')
                ->where('id_type', '=', $type)
                ->get();

        return $priceHour;
    }

    private function pricePublication($type = 1)
    {
        $pricePublication = DB::table('price_publication')
                ->select('price_publication.*')
                ->where('id_type', '=', $type)
                ->get();

        return $pricePublication;
    }

    private function calculateDate($range)
    {
        list($publish_date, $unpublish_date) = explode('-', $range);

        $publish_date = strtotime($publish_date);
        $publish_date = date('Y-m-d', $publish_date);

        $unpublish_date = strtotime($unpublish_date);
        $unpublish_date = date('Y-m-d', $unpublish_date);

        return ['publish_date' => $publish_date, 'unpublish_date' => $unpublish_date];
    }

    private function calculateSchedule($request)
    {
        $scheduleTime = array(
            (!empty($request['franja1'])) ? $request['franja1'] : '',
            (!empty($request['franja2'])) ? $request['franja2'] : '',
            (!empty($request['franja3'])) ? $request['franja3'] : '',
            (!empty($request['franja4'])) ? $request['franja4'] : '',
            '',
        );
        
        $scheduleTime = array_values(array_filter($scheduleTime));
        return json_encode($scheduleTime);
    }

    private function calculatePrice($dates, $scheduleTime)
    {
        $priceHour = $this->priceHour()[0]->price;
        $pricePublication = $this->pricePublication()[0]->price;

        $finalPrice = $pricePublication + ($priceHour * count(json_decode($scheduleTime)));

        $diff = date_diff(date_create($dates['publish_date']), date_create($dates['unpublish_date']))->format("%a") + 1;

        if ($diff > 14 && $diff < 30) {
            $finalPrice = $finalPrice - ($finalPrice * 0.15);
        } elseif ($diff >= 30) {
            $finalPrice = $finalPrice - ($finalPrice * 0.30);
        }

        return $finalPrice;
    }

    private function secondaryImage($request, $id)
    {
        if($request->hasFile('secondary_img')) {
            $total = 4;
            $num = 0;
            while ($num <= $total) {
                //var_dump(empty($request->file('secondary_img')[$num]));
                if (empty($request->file('secondary_img')[$num])) {
                    break;
                }
                
                $secondary_img = $request->file('secondary_img')[$num];
                //var_dump($request->file('secondary_img')[$num], $num);
                $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
                $filename = $id."-".$random_number.time().'.' . $secondary_img->getClientOriginalExtension();
            
                $img = Image::make($secondary_img);
                if($request->input('tipo_publicidad') == 1){
                    $img->resize(1920, 750, 
                        function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        }
                    )->insert(public_path('img/watermark.png'), 'center')->save(public_path('/img/rotador-principal/imagenes_secundarias/' . $filename));
                }elseif($request->input('tipo_publicidad') == 2 || $request->input('tipo_publicidad') == 3){
                    $img->crop(616, 815)->insert(public_path('img/watermark.png'), 'center')->save(public_path('/img/rotador-principal/imagenes_secundarias/' . $filename));
                }

                $img_data = [];
                $img_data = Photo::create([
                    'slideshow_id' => $id,
                    'img' => $filename,
                ]);

                sleep(1);
                $num++;
            }
        }
    }
}
