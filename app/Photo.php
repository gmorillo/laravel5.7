<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slideshow;

class Photo extends Model
{
    protected $fillable = [
        'slideshow_id',
    ];


	public function slideshow()
    {
        return $this -> belongsToMany(Slideshow::class);
    }
}
