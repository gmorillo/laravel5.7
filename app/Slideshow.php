<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Country;
use App\City;
use App\Photo;

class Slideshow extends Model
{
	protected $fillable = [
        'publicity_type', 'status','user_id', 'category_id', 'country_id','city_id','title', 'phone', 'mail','langues','description', 'principal_img', 'creation_date','unpublish_date', 'time_activated', 'schedule', 'publish_date', 'unpublish_date', 'price',
    ];

    public function user()
    {
        return $this -> belongsToMany(User::class);
    }

    public function category()
    {
        return $this -> belongsToMany(Category::class);
    }

    public function country()
    {
        return $this -> belongsToMany(Country::class);
    }

    public function city()
    {
        return $this -> belongsToMany(City::class);
    }
    public function photo()
    {
        return $this -> belongsToMany(Photo::class);
    }
}
