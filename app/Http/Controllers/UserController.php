<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use DB;


class UserController extends Controller
{
    public function profile_img()
    {
        return view('sections.profile.profile', array('user' => Auth::user()));
    }

    public function updateProfileImg(Request $request)
    {
        $hasImage =   Auth::user()->profile_img;
        $ImageRoute = public_path('/img/profiles/' . $hasImage);

        if($request->hasFile('profile_img')) 
        {
            $profile_img = $request->file('profile_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();
            
            Image::make($profile_img)
            ->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/img/profiles/' . $filename));

            $user = Auth::user();
            $user->profile_img = $filename;
            $user->save();
        }

        if($hasImage != 'default-user.png'){
            if(\File::exists(public_path('/img/profiles/' . $hasImage))){\File::delete(public_path('/img/profiles/' . $hasImage));}
        }
        return redirect('/profile')->with('profileImg', 'Imágen de perfíl actualizada con exito!!!');
    }
    
}
