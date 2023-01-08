<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Kbli1;
use App\Models\Pendaftaran;
use App\Models\SkalaUsaha;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = City::where('prov_id', '=', 16)->get();
        $kbli = Kbli1::all();
        $num = rand(10101, 01010);
        return view('home')->with([
            'skalaUsaha' => SkalaUsaha::all(),
            'no_permohonan' => 'I-' . now()->format('Ymd') . time() . rand(111, 00),
            'no_proyek' => now()->format('Ym-dH') . '-' . now()->format('is') . '-' . rand(10021, 00) . '-' . now()->format('h') . rand(1, 0),
            'cities' => $cities,
            'kbli' => $kbli,
            'nib' => now()->format('dmy') . sprintf('%07s', $num)
        ]);
    }

    public function dataPermohonan(Pendaftaran $pendaftaran)
    {
        return view('user.dataPermohonan.index')->with([
            'title' => 'Data Permohonan Anda',
            'data' => $pendaftaran
        ]);
    }
}