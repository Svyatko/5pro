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

        if(!self::getInstanceId(Region::class, self::getRegion($data))) {
            $input['city_id'] = self::getInstanceId(City::class, self::getCity($data));
        } else {
            $input['region_id'] = self::getInstanceId(Region::class, self::getRegion($data));
        }

        return self::create($input);
    }

    public static function sendRequest($lat, $lng) {
        $key = self::$key;

        $url  = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=false&key=$key";
        $json = file_get_contents($url);
        $data = json_decode($json);

        return $data;
    }

    public static function getAddress($data) {
        return $data->results[0]->formatted_address;
    }

    public static function getCity($data) {
        return self::getByKey($data, 'locality');
    }

    public static function getRegion($data) {
        return self::getByKey($data, 'administrative_area_level_1');
    }

    public static function getInstanceId($model, $name) {
        if($name) {
            $city = $model::where('name', $name)->first();
            if($city) {
                return $city->id;
            } else {
                return $model::create(['name' => $name])->id;
            }
        }
    }

    public static function getByKey($data, $string) {
        foreach ($data->results[0]->address_components as $item) {
            if(count($item->types) > 1) {
                foreach ($item->types as $type) {
                    if($type == $string) {
                        return $item->long_name;
                    }
                }
            }
        }
    }
}
