<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\JenisBadanUsahaDataTable;
use App\DataTables\JenisUsahaDataTable;
use App\Http\Controllers\Controller;
use App\Models\JenisBadanUsaha;
use App\Models\JenisUsaha;
use Illuminate\Http\Request;

class JenisBadanUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JenisBadanUsahaDataTable $dataTable)
    {
        return $dataTable->render('admin.jenis-badan-usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisUsaha = JenisUsaha::all();
        $jenisBadanUsaha = JenisBadanUsaha::all();
        return view('admin.jenis-badan-usaha.action')->with([
            'jenisBadanUsaha' => $jenisBadanUsaha,
            'jenisUsaha' => $jenisUsaha,
            'jenisBadanUsaha' => new JenisBadanUsaha(),
            'title' => 'Add Jenis Badan usaha'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_usaha' => 'required',
            'jenis_badan_usaha' => 'required'
        ]);

        JenisBadanUsaha::create([
            'jenisUsaha_id' => $request->jenis_usaha,
            'nama_jenisBadanUsaha' => $request->jenis_badan_usaha
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data jenis badan usaha created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBadanUsaha $jenisBadanUsaha)
    {
        $jenisUsaha = JenisUsaha::all();
        return view('admin.jenis-badan-usaha.action')->with([
            'jenisBadanUsaha' => $jenisBadanUsaha,
            'jenisUsaha' => $jenisUsaha,
            'title' => "Update Jenis Badan Usaha"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisBadanUsaha $jenisBadanUsaha)
    {
        $request->validate([
            'jenis_usaha' => 'required',
            'jenis_badan_usaha' => 'required'
        ]);

        $jenisBadanUsaha->jenisUsaha_id = $request->jenis_usaha;
        $jenisBadanUsaha->nama_jenisBadanUsaha = $request->jenis_badan_usaha;
        $jenisBadanUsaha->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Jenis Badan Usaha Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBadanUsaha $jenisBadanUsaha)
    {
        $jenisBadanUsaha->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted successfully'
        ]);
    }
}