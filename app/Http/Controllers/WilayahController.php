<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getKecamatan($cityId)
    {
        $kecamatan = Kecamatan::where('city_id', $cityId)->get();
        return response()->json($kecamatan);
    }

    public function getKelurahan($kecamatanId)
    {
        $kelurahan = Kelurahan::where('dis_id', $kecamatanId)->get();
        return response()->json($kelurahan);
    }
}