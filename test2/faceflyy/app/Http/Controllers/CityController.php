<?php

namespace App\Http\Controllers;

use App\Model\City;
use App\Model\FlightClass;

class CityController extends Controller{
    public function index(){
        $cities = City::all();
        $flight_classes = FlightClass::all();
        return view('index', compact('cities','flight_classes') );
    }
}