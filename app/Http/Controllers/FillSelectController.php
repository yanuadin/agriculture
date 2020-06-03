<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class FillSelectController extends Controller
{
    public function province(){
        return response()->json(Province::get());
    }

    public function regency($province_id){
        return response()->json(Regency::where('province_id', $province_id)->get());
    }

    public function district($regency_id){
        return response()->json(District::where('regency_id', $regency_id)->get());
    }
}
