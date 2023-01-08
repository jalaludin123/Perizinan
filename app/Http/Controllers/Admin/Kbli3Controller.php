<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Kbli3DataTable;
use App\Http\Controllers\Controller;
use App\Models\Kbli2;
use App\Models\Kbli3;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Kbli3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kbli3DataTable $dataTable)
    {
        return $dataTable->render('admin.kbli.kbli3.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kbli3 = Kbli3::all();
        $kbli2 = Kbli2::all();
        return view('admin.kbli.kbli3.action')->with([
            'kbli2' => $kbli2,
            'kbli3' => $kbli3,
            'kbli3' => new Kbli3(),
            'title' => 'Add Data KBLI 3'
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
            'kbli2' => 'required',
            'kode' => 'required|unique:golongan_3,kode_kbli|digits:3|numeric',
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        Kbli3::create([
            'golongan_2_id' => $request->kbli2,
            'kode_kbli' => $request->kode,
            'nama_kbli' => $request->name,
            'fungsi_kbli' => $request->fungsi
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
    public function edit(Kbli3 $kbli3)
    {
        $kbli2 = Kbli2::all();
        return view('admin.kbli.kbli3.action')->with([
            'kbli3' => $kbli3,
            'kbli2' => $kbli2,
            'title' => 'Update Data KBLI 3'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kbli3 $kbli3)
    {
        $request->validate([
            'kbli2' => 'required',
            'kode' => ['required', Rule::unique('golongan_3', 'kode_kbli')->ignore($kbli3), 'digits:3', 'numeric'],
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        $kbli3->golongan_2_id = $request->kbli2;
        $kbli3->kode_kbli = $request->kode;
        $kbli3->nama_kbli = $request->name;
        $kbli3->fungsi_kbli = $request->fungsi;
        $kbli3->save();

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
    public function destroy(Kbli3 $kbli3)
    {
        $kbli3->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted Successfully'
        ]);
    }
}