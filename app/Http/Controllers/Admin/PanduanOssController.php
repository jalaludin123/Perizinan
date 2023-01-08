<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanduanOss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PanduanOssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = PanduanOss::latest()->paginate(5);
        return view('admin.panduan.index')->with([
            'title' => 'Data File Panduan Oss',
            'files' => $file,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.panduan.create')->with([
            'title' => 'Add File Panduan OSS'
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
            'nama_file' => 'required',
            'file_panduan' => 'required|file|mimes:pdf|max:5048',
            'kategori' => 'required'
        ]);
        $file = $request->file('file_panduan');
        $fileName = time() . $file->hashName();
        $file->move('file', $fileName);

        PanduanOss::create([
            'nama_panduan' => $request->nama_file,
            'file_panduan' => $fileName,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('panduan.index')->with('message', 'Data created successfully');
    }

    public function viewPdf(PanduanOss $panduan)
    {
        return view('admin.panduan.view-pdf', compact('panduan'));
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
    public function edit(PanduanOss $panduan)
    {
        return view('admin.panduan.edit')->with([
            'title' => 'Edit Data File Panduan',
            'panduan' => $panduan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PanduanOss $panduan)
    {
        $request->validate([
            'nama_file' => 'required',
            'file_panduan' => 'file|mimes:pdf|max:5048',
            'kategori' => 'required'
        ]);

        if ($request->hasFile('file_panduan')) {
            File::delete('file/' . $panduan->file_panduan);
            $file = $request->file('file_panduan');
            $fileName = time() . $file->hashName();
            $file->move('file', $fileName);

            $panduan->update([
                'nama_panduan' => $request->nama_file,
                'file_panduan' => $fileName,
                'kategori' => $request->kategori
            ]);
        } else {
            $panduan->update([
                'nama_panduan' => $request->nama_file,
                'kategori' => $request->kategori
            ]);
        }
        return redirect()->route('panduan.index')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PanduanOss $panduan)
    {
        File::delete('file/' . $panduan->file_panduan);
        $panduan->delete();
        return redirect()->route('panduan.index')->with('message', 'Data Deleted Successfully');
    }
}