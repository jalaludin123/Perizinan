<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Kbli1DataTable;
use App\Http\Controllers\Controller;
use App\Models\Kbli1;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Kbli1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kbli1DataTable $dataTable)
    {
        return $dataTable->render('admin.kbli.kbli1.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kbli.kbli1.action', ['kbli1' => new Kbli1(), 'title' => 'Add Data KBLI 1']);
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
            'kode' => 'required|unique:kbli,kode_kbli|string|digits:1',
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        Kbli1::create([
            'kode_kbli' => $request->kode,
            'nama_kbli' => $request->name,
            'fungsi_kbli' => $request->fungsi
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
    public function edit(Kbli1 $kbli1)
    {
        return view('admin.kbli.kbli1.action')->with([
            'kbli1' => $kbli1,
            'title' => 'Update Data KBLI 1'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kbli1 $kbli1)
    {
        $request->validate([
            'kode' => ['required', Rule::unique('kbli', 'kode_kbli')->ignore($kbli1), 'string', 'digits:1'],
            'name' => 'required',
            'fungsi' => 'required'
        ]);

        $kbli1->kode_kbli = $request->kode;
        $kbli1->nama_kbli = $request->name;
        $kbli1->fungsi_kbli = $request->fungsi;
        $kbli1->save();

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
    public function destroy(Kbli1 $kbli1)
    {
        $kbli1->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Deleted success'
        ]);
    }
}