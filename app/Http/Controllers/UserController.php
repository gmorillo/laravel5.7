<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;


class UserController extends Controller
{
    public function profile_img()
    {
        return view('auth.profile', array('user' => Auth::user()));
    }

    public function updateProfileImg(Request $request)
    {
    	if ($request->hasFile('profile_img')) 
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

    	return view('auth.profile', array('user' => Auth::user()));
    }
}
