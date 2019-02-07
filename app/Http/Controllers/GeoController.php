<?php

namespace App\Http\Controllers;

use App\Models\Geo;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'lng' => 'required',
            'lat' => 'required'
        ]);

        Geo::store($request);

        return response('geocordinates has been added');
    }
}
