<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Kbli5DataTable;
use App\Http\Controllers\Controller;
use App\Models\Kbli4;
use App\Models\Kbli5;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Kbli5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kbli5DataTable $dataTable)
    {
        return $dataTable->render('admin.kbli.kbli5.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kbli4 = Kbli4::all();
        $kbli5 = Kbli5::all();
        return view('admin.kbli.kbli5.action')->with([
            'kbli4' => $kbli4,
            'kbli5' => $kbli5,
            'kbli5' => new Kbli5(),
            'title' => 'Add Data KBLI 5'
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
            'kbli4' => 'required',
            'kode' => 'required|unique:golongan_5,kode_kbli|digits:5|numeric',
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        Kbli5::create([
            'golongan_4_id' => $request->kbli4,
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
    public function edit(Kbli5 $kbli5)
    {
        $kbli4 = Kbli4::all();
        return view('admin.kbli.kbli5.action')->with([
            'kbli5' => $kbli5,
            'kbli4' => $kbli4,
            'title' => 'Update Data KBLI 5'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kbli5 $kbli5)
    {
        $request->validate([
            'kbli4' => 'required',
            'kode' => ['required', Rule::unique('golongan_5', 'kode_kbli')->ignore($kbli5), 'digits:5', 'numeric'],
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        $kbli5->golongan_4_id = $request->kbli4;
        $kbli5->kode_kbli = $request->kode;
        $kbli5->nama_kbli = $request->name;
        $kbli5->fungsi_kbli = $request->fungsi;
        $kbli5->save();

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
    public function destroy(Kbli5 $kbli5)
    {
        $kbli5->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted Successfully'
        ]);
    }
}