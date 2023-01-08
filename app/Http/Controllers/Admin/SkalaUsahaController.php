<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkalaUsahaDataTable;
use App\Http\Controllers\Controller;
use App\Models\SkalaUsaha;
use Illuminate\Http\Request;

class SkalaUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SkalaUsahaDataTable $dataTable)
    {
        return $dataTable->render('admin.skala-usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skala-usaha.action', ['skalaUsaha' => new SkalaUsaha(), 'title' => 'Add Data Skala Usahas']);
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
            'skala_usaha' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required'
        ]);

        SkalaUsaha::create([
            'nama_skala_usaha' => $request->skala_usaha,
            'keterangan_skala_usaha' => $request->keterangan,
            'description_skala_usaha' => $request->deskripsi
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Created success'
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
    public function edit(SkalaUsaha $skalaUsaha)
    {
        return view('admin.skala-usaha.action')->with([
            'skalaUsaha' => $skalaUsaha,
            'title' => 'Update Data Skala Usaha'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkalaUsaha $skalaUsaha)
    {
        $request->validate([
            'skala_usaha' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required'
        ]);

        $skalaUsaha->nama_skala_usaha = $request->skala_usaha;
        $skalaUsaha->keterangan_skala_usaha = $request->keterangan;
        $skalaUsaha->description_skala_usaha = $request->deskripsi;
        $skalaUsaha->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Updated success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkalaUsaha $skalaUsaha)
    {
        $skalaUsaha->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted Successfully'
        ]);
    }
}