<?php


namespace App\Http\Controllers;

use App\Model\FlightBook;

class FlightBookController
{
    public function flight_book(){
        
        
        $flightbook = FlightBook::all();

        return view('flight-book', compact('$flightbook', '$flight_classes'));
    }
}