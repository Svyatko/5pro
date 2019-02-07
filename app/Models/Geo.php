<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lat', 'lng', 'address', 'city_id', 'region_id',
    ];

    protected static $key = 'AIzaSyDfweepe9NgkVS5a6ntqDk2paSOogr3Amg';

    protected $table = 'geolocates';

    public static function store($request) {
        $input = $request->only('lng', 'lat');
        $data = self::sendRequest($input['lat'], $input['lng']);

        $input['address'] = self::getAddress($data);
        $input['city_id'] = self::getInstanceId(City::class, self::getCity($data));
        $input['region_id'] = self::getInstanceId(Region::class, self::getRegion($data));

        return self::create($input);
    }

    public static function sendRequest($lat, $lng) {
        $key = self::$key;

        $url  = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=false&key=$key";
        $json = @file_get_contents($url);
        $data = json_decode($json);

        return $data;
    }

    public static function getAddress($data) {
        return $data->results[0]->formatted_address;
    }

    public static function getCity($data) {
        return $data->results[0]->address_components[3]->long_name;
    }

    public static function getRegion($data) {
        if(isset($data->results[0]->address_components[5]->long_name)) {
            return $data->results[0]->address_components[5]->long_name;
        } else {
            return $data->results[0]->address_components[2]->long_name;
        }
    }

    public static function getInstanceId($model, $name) {
        $city = $model::where('name', $name)->first();
        if($city) {
            return $city->id;
        } else {
            return $model::create(['name' => $name])->id;
        }
    }
}
