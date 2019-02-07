<?php

namespace App\Http\Controllers;

use App\Models\Region;

class RegionController extends Controller
{

    public function index() {
        $regions = Region::select('id', 'name')->get()->toJson();

        return view('regions.index', compact('regions'));
    }

    public function show($id) {
        $region = Region::find($id);

        $address = $region->geos()->get()->toJson();

        return view('regions.show', compact('address'));
    }
}
