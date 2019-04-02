<?php

namespace App\Http\Controllers;

use App\Model\Airline;
use App\Model\City;
use App\Model\Flight_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateFlightController extends Controller {

    public function flight_infor() {
        $cities = City::getCityJoinNation();
        $airlines = Airline::getAirline();

        return view('flight-create', compact('cities', 'airlines'));
    }

    public function flight_create(Request $request) {
        $validator = Validator::make($request->all(), [
                    'from' => 'required',
                    'total_person' => 'required',
                    'to' => 'required',
                    'air' => 'required',
                    'departure' => 'required',
                    'return_day' => 'required',
                    'landing' => 'required',
                    'flight_class' => 'required',
                        ], [
                    'total_person.required' => 'Tổng số người không được bỏ trống',
                    'departure.required' => 'Khởi hành không được bỏ trống',
                    'return_day.required' => 'Khứ hồi không được bỏ trống',
                    'landing.required' => 'Hạ cánh không được bỏ trống',
        ]);
        if ($validator->fails()) {
            return redirect()->route('flight-create')->withErrors($validator)->withInput();
        } else {
            $city1 = $request->from;
            $city2 = $request->to;
            $air = $request->air;
            $depart = $request->departure;
            $return = $request->return_day;
            $land = $request->landing;


            if ($city1 == $city2) {
                return redirect()->route('flight-create')->with('errorND', 'Nơi đi không được trùng với nơi đến');
            } else {
                if (Flight_list::kt_baynoidia($city1, $city2)) {
                    if (Flight_list::kt_hangbay_noidia($city1, $city2, $air)) {
                        Flight_list::insertFL($request->all());
                        return redirect()->route('flight-create')->with('success', 'Tạo chuyến nội địa thành công');
                    } else {
                        return redirect()->route('flight-create')->with('errorND', 'Chuyến bay phải do quốc gia đó khai thác');
                    }
                } else if (Flight_list::kt_bay_xuyenquocgia($city1, $city2)) {
                    Flight_list::insertFL($request->all());
                    return redirect()->route('flight-create')->with('success', 'Tạo chuyến xuyên quốc gia thành công');
                } else {
                    return redirect()->route('flight-create')->with('errorND', 'Hai quốc gia không có liên kết');
                }
            }
        }
    }

}
