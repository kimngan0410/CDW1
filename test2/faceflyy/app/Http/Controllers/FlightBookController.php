<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Model\FlightBook;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;

class FlightBookController
{
    public function flight_book(Request $request){
        $flightbook = FlightBook::all();
        
        $total = Session::get('total');

        return view('flight-book', compact('flightbook', 'total'));
    }
    
    public function postRegister(Request $request) {
        $user = new Register();
        
        $validator = Validator::make($request->all(), [
                    'user_email' => 'required|email|unique:users',
                    'user_password' => 'required|min:5',
                    'user_first_name' => 'required',
                    'user_last_name' => 'required',
                    'user_phone' => 'required|numeric',
                        ], [
        ]);
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator);
        } else {
            $user->insertUser($request->all());
            
            return redirect()->route('register')->with('success','Create success');
        }
    }
}