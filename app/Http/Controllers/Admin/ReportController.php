<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function terverifikasi()
    {
        $verifikasi = Pendaftaran::where('status', '=', 0)->latest()->paginate(7);
        return view('admin.report.terverifikasi')->with([
            'terverifikasi' => $verifikasi,
            'title' => 'Data Report',
            'i' => (request()->input('page', 1) - 1) * 7
        ]);
    }

    public function tidakTerverifikasi()
    {
        $verifikasi = Pendaftaran::where('status', '=', 1)->latest()->paginate(7);
        return view('admin.report.tidakTerverifikasi')->with([
            'verifikasi' => $verifikasi,
            'title' => 'Data Report',
            'i' => (request()->input('page', 1) - 1) * 7
        ]);
    }

    public function detailPendaftaran(Pendaftaran $pendaftaran)
    {
        return view('admin.report.detailTidakTerverifikasi', compact('pendaftaran'));
    }

    public function detailTerverifikasi(Pendaftaran $pendaftaran)
    {
        return view('admin.report.detailTerverifikasi', compact('pendaftaran'));
    }

    public function printPdf()
    {
        $date = now()->format('d-M-Y');
        $Perizinan = Pendaftaran::where('status', '=', 1)->get();
        $pdf = Pdf::loadView('admin.report.printPdf', ['perizinans' => $Perizinan, 'date' => $date, 'i' => (request()->input('page', 1) - 1) * $Perizinan->count()])->setPaper('letter', 'landscape');
        return $pdf->download('dinas.pdf');
    }

    public function verifikasiPerizinan(Pendaftaran $pendaftaran)
    {
        $date = now()->format('d-M-Y');
        $data['mail'] = $pendaftaran->user->email;
        $data['subject'] = 'Sertifikat Perizinan';
        $data['pendaftaran'] = $pendaftaran;
        $perizinan = $pendaftaran->status;
        if ($perizinan == 1) {
            $pendaftaran->update([
                'status' => 0
            ]);

            $pdf = Pdf::loadView('admin.report.sertifikat', ['perizinan' => $pendaftaran, 'date' => $date]);
            Mail::send('admin.report.sendMail', $data, function ($message) use ($data, $pdf) {
                $message->to($data['mail'], $data['mail'])
                    ->subject($data['subject'])
                    ->attachData($pdf->output(), time() . '-' . 'sertifikat.pdf');
            });
            return redirect()->to('admin/tidakTerverifikasi')->with('message', 'Data berhasil di verifikasi');
        } else {
            return redirect()->to('admin/tidakTerverifikasi')->with('message', 'Data gagal di verifikasi');
        }
    }

    public function printAll()
    {
        $data = Pendaftaran::where('status', 0)->get();
        $date = now()->format('d-M-Y');
        $pdf = Pdf::loadView('admin.report.printAll', ['perizinans' => $data, 'date' => $date, 'i' => (request()->input('page', 1) - 1) * $data->count()])->setPaper('letter', 'potrait');
        return $pdf->download(date('dmy') . '.pdf');
    }

    // public function laporan()
    // {
    //     $tahun = date('Y') - 22;
    //     return view('admin.report.laporan')->with([
    //         'title' => 'Data Laporan Perizinan',
    //         'tahun' => $tahun,
    //         'kecamatan' => Kecamatan::where('city_id', '246')->get()
    //     ]);
    // }

    // public function cari(Request $request)
    // {
    //     $data = '';
    //     $data = Pendaftaran::where('status', '0')->paginate(5);
    //     if ($request->kecamatan && $request->tahun) {
    //         $data = Pendaftaran::where('dis_id', $request->kecamatan)->where('updated_at', 'like', '%' . $request->tahun . '%')->where('status', '0')->paginate(5);
    //     } elseif ($request->tahun) {
    //         $data = Pendaftaran::where('updated_at', 'like', '%' . $request->tahun . '%')->where('status', '0')->paginate(5);
    //     } elseif ($request->kecamatan) {
    //         $data = Pendaftaran::where('dis_id', $request->kecamatan)->where('status', '0')->paginate(5);
    //     }
    //     return view('admin.report.dataLaporan')->with([
    //         'data' => $data,
    //         'title' => 'Data Laporan',
    //         'i' => (request()->input('page', 1) - 1) * 5
    //     ]);
    // }

    public function destroyTerverifikasi(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->to('admin/terverifikasi')->with('message', 'Data Successfully Deleted');
    }

    public function destroyTidakTerverifikasi(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->to('admin/terverifikasi')->with('message', 'Data Successfully Deleted');
    }
}