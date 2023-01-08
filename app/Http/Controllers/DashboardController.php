<?php

namespace App\Http\Controllers;

use App\Charts\ReportChart;
use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Chart Perkecamatan
        $perizinan = DB::table('pendaftarans')->select(DB::raw('count(*) as count, kecamatan'))->where('status', 0)->groupBy('kecamatan')->pluck('count', 'month_name');;
        $labels = $perizinan->flatten(1)->pluck('kecamatan');
        $dataPerkecamatan = $perizinan->flatten(1)->pluck('kecamatan_count');
        $chart = new ReportChart;
        $chart->labels($labels);
        $chart->dataset('Jumlah Perusahan', 'line', $dataPerkecamatan);
        // End Chart Kecamatan

        $user = User::where('role', 0)->count();
        $verifikasi = Pendaftaran::where('status', 0)->count();
        $belumtervifikasi = Pendaftaran::where('status', 1)->count();
        return view('dashboard', compact('user', 'verifikasi', 'belumtervifikasi', 'chart'));
    }
}
