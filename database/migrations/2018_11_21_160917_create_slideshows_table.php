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
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('country_id')->default(1);
            $table->integer('city_id')->nullable();
            $table->string('title')->nullable();
            $table->integer('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('langues')->nullable();
            $table->text('description')->nullable();
            $table->string('principal_img')->nullable();
            $table->date('creation_date')->nullable();
            $table->time('time_activated')->nullable(); //hora en la que se activo la publicación
            $table->date('publish_date')->nullable(); // fecha en la que se dió de alta la publicación
            $table->date('unpublish_date')->nullable(); // fecha en la que se dará de baja la publicación
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