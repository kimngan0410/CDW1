<?php

namespace App\Http\Controllers;

use App\Model\Flight_list;
use App\Model\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FlightListController extends Controller {

    public function flight_list(Request $request) {
        
        $citylists = City::get();

        $data = new FlightListDetailController();
        $flightlists = $data->flight_list($request);
        
        $transits = $data->countTransit();

        $form_departure = $request->input('departure');
        $fdepart = strtotime($form_departure);
        
        foreach ($flightlists as $flightlist):
            $departure = strtotime($flightlist->fl_departure_day);
        endforeach;
        
        $f = $flightlist->fl_total_km;
        $cost = new Flight_list();
        $cal = $cost->getCost($fdepart, $departure, $f);

        return view('/flight-list', compact('flightlists', 'citylists', 'transits', 'cal'));
    }

}
