<?php

namespace App\Http\Controllers;

use App\Model\Airport;
use App\Model\City;

class AirportController extends Controller{
    public function index() {
        $cities = City::get();
        $airports = Airport::get();
        return view('city-list', compact('cities','airports') );
    }
}