<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Slideshow extends Model
{
	protected $fillable = [
        'status','user_id', 'category_id', 'country_id','city_id','title', 'phone', 'mail','langues','description', 'principal_img', 'secondaries_img','creation_date','unpublish_date', 'time_activated',
    ];

    public function user()
    {
        return $this -> belongsToMany(User::class);
    }
}
