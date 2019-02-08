<?php

use Illuminate\Database\Seeder;
use App\Slideshow;

class SlideshowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slideshow::create([
            'status' => 1,
            'user_id' => 3,
            'category_id' => 1,
            'country_id' => 1,
            'publicity_type' => 1,
            'city_id' => 1,
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magni quod velit veniam magnam alias voluptas itaque natus odit. Unde?',
            'phone' => '666999988',
            'mail' => 'escortuser@bembosex.com',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum vitae maxime quidem, error nam reiciendis iste architecto optio, a, vero ea. Inventore, excepturi illo odio consequatur officia qui quidem deleniti recusandae veniam ipsum? Officia fugiat ea porro, veniam asperiores accusantium ex numquam neque commodi. Quaerat deleniti expedita, omnis soluta. Iusto soluta exercitationem doloremque, error porro, tempora quas cumque amet, vel debitis, earum sed quidem veniam. Dolorem laudantium nisi quisquam velit, cumque tenetur voluptates voluptatibus consequatur. Vero cumque, enim possimus facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias laudantium aperiam veritatis iusto impedit laboriosam nostrum, facere praesentium. Aliquam nam sequi eum, reiciendis voluptate quos.',
            'principal_img' => '',
            'creation_date' => date("Y-m-d H:i:s"),
            'unpublish_date' => NULL,
            'publish_date' => NULL,
            'time_activated' => NULL,
        ]);
    }
}


/*

$table->boolean('status');
$table->integer('user_id');
$table->integer('category_id');
$table->integer('country_id');
$table->integer('city_id');
$table->string('title');
$table->integer('phone');
$table->string('mail');
$table->string('langues')->nullable();
$table->text('description');
$table->string('principal_img');
$table->string('secondaries_img')->nullable();
$table->date('creation_date');
$table->date('unpublish_date')->nullable(); // fecha en la que se dará de baja la publicación
$table->time('time_activated')->nullable(); //hora en la que se activo la publicación

*/