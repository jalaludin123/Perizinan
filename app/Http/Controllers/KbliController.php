<?php

namespace App\Http\Controllers;

use App\Models\Kbli2;
use App\Models\Kbli3;
use App\Models\Kbli4;
use App\Models\Kbli5;
use Illuminate\Http\Request;

class KbliController extends Controller
{
    public function getKbli2($kbli1Id)
    {
        $kbli_II = Kbli2::where('kbli_id', $kbli1Id)->get();
        return response()->json($kbli_II);
    }

    public function getKbli3($kbli2Id)
    {
        $kbli_III = Kbli3::where('golongan_2_id', $kbli2Id)->get();
        return response()->json($kbli_III);
    }

    public function getKbli4($kbli3Id)
    {
        $kbli_IV = Kbli4::where('golongan_3_id', $kbli3Id)->get();
        return response()->json($kbli_IV);
    }

    public function getKbli5($kbli4Id)
    {
        $kbli_V = Kbli5::where('golongan_4_id', $kbli4Id)->get();
        return response()->json($kbli_V);
    }
}