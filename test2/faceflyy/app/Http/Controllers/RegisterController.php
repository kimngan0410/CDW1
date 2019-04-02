<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use App\Model\Register;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{
    
    public function index(){
        return view('/register');
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
            // dd($validator->errors());
            return redirect()->route('register')->withErrors($validator);
        } else {
            $user->insertUser($request->all());
            
            return redirect()->route('register')->with('success','Đăng ký thành công');
        }
    }
    
}
