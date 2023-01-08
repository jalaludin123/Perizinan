<?php

namespace App\Http\Controllers;

use App\Models\Kbli1;
use App\Models\Kbli2;
use App\Models\Kbli3;
use App\Models\Kbli4;
use App\Models\PanduanOss;
use App\Models\Slide;

class HomePageController extends Controller
{
    public function index()
    {
        return view('welcome')->with([
            'slide' => Slide::all(),
            'kbli' => Kbli1::all()
        ]);
    }

    public function getKbli2(Kbli1 $kbli1)
    {
        return view('user.kbli.kbli2')->with([
            'slide' => Slide::all(),
            'kbli' => $kbli1,
        ]);
    }

    public function getKbli3(Kbli2 $kbli2)
    {
        return view('user.kbli.kbli3')->with([
            'slide' => Slide::all(),
            'kbli' => $kbli2,
        ]);
    }

    public function getKbli4(Kbli3 $kbli3)
    {
        return view('user.kbli.kbli4')->with([
            'slide' => Slide::all(),
            'kbli' => $kbli3,
        ]);
    }

    public function getKbli5(Kbli4 $kbli4)
    {
        return view('user.kbli.kbli5')->with([
            'slide' => Slide::all(),
            'kbli' => $kbli4,
        ]);
    }

    public function panduanOss()
    {
        $panduan = PanduanOss::all();
        return view('user.frontend.panduanOss', compact('panduan'));
    }

    public function viewPdf(PanduanOss $panduan)
    {
        return view('user.frontend.view', compact('panduan'));
    }
}