<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Login extends Model{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    
    public static function getUser($email){
        return Login::where('user_email', $email)->get();
    }

    public static function firstUser($email){
        return Login::where('user_email', $email)->first();
    }

    public static function updateTime($email){
        Login::where('user_email', $email)
            ->update(['user_last_access'=>date('Y-m-d H:i:s'),
                'user_attempt' => 0,
                'user_status' => 1]);
    }
    
    public static function updateUser($pass, $fname, $lname, $tel){
        Login::where('user_email', Session::get('user_email'))
            ->update([
                'user_password'=>bcrypt($pass),
                'user_first_name'=>$fname,
                'user_last_name'=>$lname,
                'user_phone'=>$tel,
            ]);
    }
    
    public static function lockUser($email){
        Login::where('user_email', $email)
            ->update(['user_status' => 0,
                'user_last_access'=>date('Y-m-d H:i:s'),]);
    }

    public static function countLoginFalse($email, $attempt){
        Login::where('user_email', $email)
            ->update(['user_attempt' => $attempt+1,
                'user_last_access'=>date('Y-m-d H:i:s'),]);
    }

}
