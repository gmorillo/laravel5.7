<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideshowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshows', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(0);
            $table->integer('publicity_type');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('country_id')->default(1);
            $table->integer('city_id');
            $table->text('title')->nullable();
            $table->integer('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('langues')->nullable();
            $table->text('description')->nullable();
            $table->string('principal_img')->nullable();
            $table->date('creation_date')->nullable();
            $table->time('time_activated')->nullable(); //hora en la que se activo la publicación
            $table->date('publish_date')->nullable(); // fecha en la que se dió de alta la publicación
            $table->date('unpublish_date')->nullable(); // fecha en la que se dará de baja la publicación
            $table->float('price')->nullable(); // precio de la publicacion
            $table->string('schedule')->nullable(); // precio de la publicacion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slideshows');
    }
}