<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JenisBadanUsaha;
use App\Models\JenisUsaha;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendaftaran;
use App\Models\SkalaUsaha;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('user.pendaftran.index')->with([
            'skalaUsaha' => SkalaUsaha::all()
        ]);
    }

    public function createAkun(Request $request)
    {
        $skalaUsaha = SkalaUsaha::where('id', $request->skalaUsaha)->first();
        return view('auth.register')->with([
            'skalaUsaha' => $skalaUsaha,
            'jenisSkalaUsaha' => JenisUsaha::all()
        ]);
    }

    public function getDataJenisUsaha($jenisUsaha_Id)
    {
        $jenisUsaha = JenisBadanUsaha::where('jenisUsaha_id', $jenisUsaha_Id)->get();
        return response()->json($jenisUsaha);
    }

    public function getDataSkalaUsaha($skalaUsaha_id)
    {
        $jenisPelakuUsaha = '';

        if ($skalaUsaha_id == 1) {
            $jenisPelakuUsaha = JenisUsaha::where('status', '=', 0)->get();
        } else {
            $jenisPelakuUsaha = JenisUsaha::all();
        }

        return response()->json($jenisPelakuUsaha);
    }

    public function store(Request $request)
    {
        $kecamatan = Kecamatan::where('dis_id', $request->kecamatan)->first();
        $kelurahan = Kelurahan::where('subdis_id', $request->kelurahan)->first();
        $daftar = User::findOrFail(Auth::user()->id);
        $request->validate([
            'modal' => 'required',
            'pelaku_usaha' => 'required',
            'nama_usaha' => 'required',
            'jenis_proyek' => 'required',
            'risiko' => 'required',
            'no_sk' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'address' => 'required',
            'name_perusahaan' => 'required',
            'phone' => 'required|min:10',
            'nik' => 'required|digits:16',
            'npwp' => 'required|min:20',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'kbli1' => 'required',
            'kbli2' => 'required',
            'kbli3' => 'required',
            'kbli4' => 'required',
            'kbli5' => 'required'
        ]);

        $daftar->pendaftaran()->update([
            'golongan_5_id' => $request->kbli5,
            'jenisUsaha_id' => $request->pelaku_usaha,
            'skalaUsaha_id' => $request->skala_usaha,
            'namaJenisUsaha' => $request->nama_usaha,
            'kelurahan' => $kelurahan->subdis_name,
            'kecamatan' => $kecamatan->dis_name,
            'phone' => $request->phone,
            'name_perusahaan' => $request->name_perusahaan,
            'no_permohonan' => $request->no_permohonan,
            'no_proyek' => $request->no_proyek,
            'nib' => $request->nib,
            'sektor' => $request->sektor,
            'modal_usaha' => $request->modal,
            'address' => $request->address,
            'name_perizinan' => $request->sertifikat,
            'risiko' => $request->risiko,
            'jenis_proyek' => $request->jenis_proyek,
            'npwp' => $request->npwp,
            'nik' => $request->nik,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tgl_lahir,
            'jabatan' => $request->jabatan,
            'no_sk' => $request->no_sk
        ]);

        $dataPermohonan = Pendaftaran::where('id', $daftar->pendaftaran->id)->first();

        $date = now()->format('d-M-Y');
        $data['mail'] = $daftar->email;
        $data['subject'] = 'Sertifikat Perizinan';
        $data['pendaftaran'] = $dataPermohonan;

        if ($dataPermohonan->status == 0) {
            $pdf = Pdf::loadView('admin.report.sertifikat', ['perizinan' => $dataPermohonan, 'date' => $date]);
            Mail::send('admin.report.sendMail', $data, function ($message) use ($data, $pdf) {
                $message->to($data['mail'], $data['mail'])
                    ->subject($data['subject'])
                    ->attachData($pdf->output(), time() . '-' . 'sertifikat.pdf');
            });
        }

        return redirect()->back()->with('message', 'Data Updated Successfully');
    }

    public function sertifikat(Pendaftaran $pendaftaran)
    {
        $date = now()->format('d-M-Y');
        $pdf = Pdf::loadView('admin.report.sertifikat', ['perizinan' => $pendaftaran, 'date' => $date]);
        return $pdf->download('Sertifikat.pdf');
    }
}