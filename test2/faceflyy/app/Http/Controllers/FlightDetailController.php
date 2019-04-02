<?php

namespace App\Http\Controllers;

use App\Model\City;
use App\Model\Flight_list;

class FlightDetailController
{
    public function flight_detail($fl_id){

        $flightdetails = Flight_list::where('fl_id', '=', $fl_id)
            ->join('airlines', 'flight_list.fl_airline_id', '=', 'airlines.airline_id')
            ->join('flight_classes', 'flight_list.fl_fc_id', '=', 'flight_classes.fc_id')
            ->get();

        $citylists = City::join('airports', 'cities.city_airport_id', '=', 'airports.airport_id')->get();

        return view('flight-detail', compact('flightdetails', 'citylists'));
    }
}