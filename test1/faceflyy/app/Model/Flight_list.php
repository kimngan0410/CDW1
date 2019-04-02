<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flight_list extends Model {

    protected $table = 'flight_list';
    protected $primaryKey = 'fl_id';

    public static function getCost($fdepart, $departure, $f) {
        $cost = 0;
        $totals = 0;

        $s = abs($departure - $fdepart);
        $d = abs(round($s / 86400));
        
        if (0 <= $f && $f <= 100) {
            $cost = 500000;
        } else if (101 <= $f && $f <= 200) {
            $cost = 1000000;
        } else if (201 <= $f && $f <= 500) {
            $cost = 2000000;
        } else if (501 <= $f && $f <= 1000) {
            $cost = 3000000;
        } else if (1001 <= $f && $f <= 2000) {
            $cost = 6000000;
        } else if (2001 <= $f && $f <= 5000) {
            $cost = 20000000;
        } else if ($f >= 5001) {
            $cost = 30000000;
        } else {
            return $cost;
        }

        if ($d >= 60) {
            $totals = $cost - ($cost * 0.1);
        } else if ($d >= 30) {
            $totals = $cost - ($cost * 0.05);
        } else if ($d >= 14) {
            $totals = $cost + ($cost * 0.1);
        } else if ($d >= 7) {
            $totals = $cost + ($cost * 0.2);
        } else if ($d >= 1) {
            $totals = $cost + ($cost * 0.5);
        } else {
            return -1;
        }
        
        return $totals;
    }

}
