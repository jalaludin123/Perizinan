<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Kbli4DataTable;
use App\Http\Controllers\Controller;
use App\Models\Kbli3;
use App\Models\Kbli4;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Kbli4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kbli4DataTable $dataTable)
    {
        return $dataTable->render('admin.kbli.kbli4.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kbli4 = Kbli4::all();
        $kbli3 = Kbli3::all();
        return view('admin.kbli.kbli4.action')->with([
            'kbli3' => $kbli3,
            'kbli4' => $kbli4,
            'kbli4' => new Kbli4(),
            'title' => 'Add Data KBLI 4'
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
            'kbli3' => 'required',
            'kode' => 'required|unique:golongan_4,kode_kbli|digits:4|numeric',
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        Kbli4::create([
            'golongan_3_id' => $request->kbli3,
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
    public function edit(Kbli4 $kbli4)
    {
        $kbli3 = Kbli3::all();
        return view('admin.kbli.kbli4.action')->with([
            'kbli4' => $kbli4,
            'kbli3' => $kbli3,
            'title' => 'Update Data KBLI 4'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kbli4 $kbli4)
    {
        $request->validate([
            'kbli3' => 'required',
            'kode' => ['required', Rule::unique('golongan_4', 'kode_kbli')->ignore($kbli4), 'digits:4', 'numeric'],
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        $kbli4->golongan_3_id = $request->kbli3;
        $kbli4->kode_kbli = $request->kode;
        $kbli4->nama_kbli = $request->name;
        $kbli4->fungsi_kbli = $request->fungsi;
        $kbli4->save();

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
    public function destroy(Kbli4 $kbli4)
    {
        $kbli4->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Deleted Successfully'
        ]);
    }
}