<?php

namespace App\Http\Controllers;

use App\Model\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UpdateController extends Controller {

    public function index() {
        return view('/update');
    }

    public function getInfor() {
        $gInfor = Login::getUser(Session::get('user_email'));
        return view('/update', compact('gInfor'));
    }

    public function postUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
                    'user_password' => '',
                    'user_first_name' => 'string',
                    'user_last_name' => 'string',
                    'user_phone' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('update')->withErrors($validator);
        } else {
            $users = Login::firstUser(Session::get('user_email'));

            if ($request->password == null) {
                $pass = $users->password;
            } else {
                $pass = $request->password;
            }
            
            if ($request->user_first_name == null) {
                $fname = $users->user_first_name;
            } else {
                $fname = $request->user_first_name;
            }
            
            if ($request->user_last_name == null) {
                $lname = $users->user_last_name;
            } else {
                $lname = $request->user_last_name;
            }
            
            if ($request->user_phone == null) {
                $phone = $users->user_phone;
            } else {
                $phone = $request->user_phone;
            }
            
            Login::updateUser($pass, $fname, $lname, $phone);
            
            return redirect()->route('update')->with('success', 'Cập nhật thành công !');
        }
    }

}
