<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeolocatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geolocates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lat');
            $table->string('lng');
            $table->string('address')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('region_id');
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
        Schema::dropIfExists('geolocates');
    }
}
