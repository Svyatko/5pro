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

        Schema::create('geolocates', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('geolocates', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['region_id']);
        });
        Schema::dropIfExists('geolocates');
    }
}
