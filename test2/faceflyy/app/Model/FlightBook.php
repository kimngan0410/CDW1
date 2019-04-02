<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FlightBook extends Model
{
    protected $table = 'flight_booking';
    protected $primaryKey = 'fb_id';
    protected $fillable = ['user_email', 'user_password', 'user_first_name', 'user_last_name', 'user_phone'];
    
    public function insertCus($data){
        Register::insert([
            'customer_first_name'=>$data['user_first_name'],
            'customer_first_name'=>$data['user_last_name'],
            'customer_phone'=>$data['cus_fname'],
            'customer_password'=>$data['user_phone'],
        ]);
    }

}