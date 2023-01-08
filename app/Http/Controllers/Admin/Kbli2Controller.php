<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Kbli2DataTable;
use App\Http\Controllers\Controller;
use App\Models\Kbli1;
use App\Models\Kbli2;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Kbli2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kbli2DataTable $dataTable)
    {
        return $dataTable->render('admin.kbli.kbli2.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kbli = Kbli1::all();
        $kbliII = Kbli2::all();
        return view('admin.kbli.kbli2.action', ['kbli2' => new Kbli2(), 'title' => 'Add Data KBLI 2'], ['kbli' => $kbli], ['kbli2' => $kbliII]);
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
            'kbli1' => 'required',
            'kode' => 'required|unique:golongan_2,kode_kbli|numeric|digits:2',
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        Kbli2::create([
            'kbli_id' => $request->kbli1,
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
    public function edit(Kbli2 $kbli2)
    {
        $kbli = Kbli1::all();
        return view('admin.kbli.kbli2.action')->with([
            'kbli2' => $kbli2,
            'kbli' => $kbli,
            'title' => 'Update Data KBLI 2'
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kbli2 $kbli2)
    {
        $request->validate([
            'kbli1' => 'required',
            'kode' => ['required', Rule::unique('golongan_2', 'kode_kbli')->ignore($kbli2), 'numeric', 'digits:2'],
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        $kbli2->kbli_id = $request->kbli1;
        $kbli2->kode_kbli = $request->kode;
        $kbli2->nama_kbli = $request->name;
        $kbli2->fungsi_kbli = $request->fungsi;
        $kbli2->save();

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
    public function destroy(Kbli2 $kbli2)
    {
        $kbli2->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted Successfully'
        ]);
    }
}