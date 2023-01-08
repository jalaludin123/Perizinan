<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\JenisUsahaDataTable;
use App\Http\Controllers\Controller;
use App\Models\JenisUsaha;
use Illuminate\Http\Request;

class JenisUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JenisUsahaDataTable $dataTable)
    {
        return $dataTable->render('admin.jenis-usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis-usaha.action', ['jenisUsaha' => new JenisUsaha(), 'title' => 'Add Data Jenis Usaha']);
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
            'jenis_usaha' => 'required'
        ]);

        JenisUsaha::create([
            'nama_jenis_usaha' => $request->jenis_usaha,
            'status' => $request->status == true ? '1' : '0',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Created Successfully'
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
    public function edit(JenisUsaha $jenisUsaha)
    {
        return view('admin.jenis-usaha.action')->with([
            'jenisUsaha' => $jenisUsaha,
            'title' => 'Update Data Jenis Usaha'
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisUsaha $jenisUsaha)
    {
        $request->validate([
            'jenis_usaha' => 'required'
        ]);

        $jenisUsaha->nama_jenis_usaha = $request->jenis_usaha;
        $jenisUsaha->status = $request->status == true ? '1' : '0';
        $jenisUsaha->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisUsaha $jenisUsaha)
    {
        $jenisUsaha->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted Successfully'
        ]);
    }
}