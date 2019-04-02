<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model{
    protected $table = 'airlines';
    protected $primaryKey = 'airline_id';
    
    public static function getAirline(){
        return Airline::all();
    }
}