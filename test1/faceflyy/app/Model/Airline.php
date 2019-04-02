<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model{
    protected $table = 'airlines';
    protected $primaryKey = 'airline_id';
}