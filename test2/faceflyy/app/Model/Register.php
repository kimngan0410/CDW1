<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Register;

class Register extends Model {

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_email', 'user_password', 'user_first_name', 'user_last_name', 'user_phone'];
    
    public function insertUser($data){
        Register::insert([
            'user_email'=>$data['user_email'],
            'user_phone'=>$data['user_phone'],
            'user_password'=>bcrypt($data['user_password']),
            'user_first_name'=>$data['user_first_name'],
            'user_last_name'=>$data['user_last_name'],
        ]);
    }
}
