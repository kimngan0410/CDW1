<?php

namespace App\Http\Controllers;

use App\Model\Airline;
use App\Model\Nation;

class AirlineController extends Controller{
    public function index() {
        $nations = Nation::all();
        $airlines = Airline::all();

        return view('airline-list', compact('nations', 'airlines'));
    }
}