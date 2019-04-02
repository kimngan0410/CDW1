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

        return view('create-flight', compact('cities', 'airlines'));
    }

    public function flight_create(Request $request) {
        $validator = Validator::make($request->all(), [
                    'from' => 'required',
                    'total_person' => 'required|numeric',
                    'to' => 'required',
                    'air' => 'required',
                    'departure' => 'required',
                    'return_day' => 'required',
                    'landing' => 'required',
                    'flight_class' => 'required',
                        ], [
                    'total_person.required' => 'Total person không được bỏ trống',
                    'total_person.numeric' => 'Total person phải là số',
                    'departure.required' => 'Departure không được bỏ trống',
                    'return_day.required' => 'Return không được bỏ trống',
                    'landing.required' => 'Landing không được bỏ trống',
        ]);
        if ($validator->fails()) {
            return redirect()->route('create-flight')->withErrors($validator)->withInput();
        } else {
            $city1 = $request->from;
            $city2 = $request->to;
            $air = $request->air;
            $depart = $request->departure;
            $return = $request->return_day;
            $land = $request->landing;


            if ($city1 == $city2) {
                return redirect()->route('create-flight')->with('errorND', 'Nơi đi không được trùng với nơi đến');
            } else {
                if (Flight_list::kiem_tra_bay_noi_dia($city1, $city2)) {
                    if (Flight_list::kiem_tra_hang_bay_noi_dia($city1, $city2, $air)) {
                        Flight_list::insertFL($request->all());
                        return redirect()->route('create-flight')->with('success', 'Tạo chuyến nội địa thành công');
                    } else {
                        return redirect()->route('create-flight')->with('errorND', 'Chuyến bay phải do quốc gia đó khai thác');
                    }
                } else if (Flight_list::kiem_tra_bay_xuyen_quoc_gia($city1, $city2)) {
                    Flight_list::insertFL($request->all());
                    return redirect()->route('create-flight')->with('success', 'Tạo chuyến xuyên quốc gia thành công');
                } else {
                    return redirect()->route('create-flight')->with('errorND', 'Hai quốc gia không có liên kết');
                }
            }
        }
    }

}
