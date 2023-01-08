<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slide::latest()->paginate(5);
        return view('admin.slide.index')->with([
            'title' => 'Data Slide',
            'images' => $images,
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
        return view('admin.slide.create')->with([
            'title' => 'Add Data Slide',
            'image' => new Slide()
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
            'slide' => 'required|image|mimes:png,jpg|max:5000'
        ]);

        $image = $request->file('slide');
        $imageName = time() . $image->hashName();
        $image->move('image', $imageName);
        Slide::create([
            'name_slide' => $request->judul,
            'slide' => $imageName
        ]);

        return redirect()->route('slide.index')->with('message', 'Data Created Successfully');
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
    public function edit(Slide $slide)
    {
        return view('admin.slide.create')->with([
            'title' => 'Update Data Slide',
            'image' => $slide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'slide' => 'image|mimes:png,jpg|max:5000'
        ]);

        if ($request->hasFile('slide')) {
            File::delete('image/' . $slide->slide);
            $image = $request->file('slide');
            $imageName = time() . $image->hashName();
            $image->move('image', $imageName);
            $slide->update([
                'name_slide' => $request->judul,
                'slide' => $imageName
            ]);
        } else {
            $slide->update([
                'name_slide' => $request->judul
            ]);
        }

        return redirect()->route('slide.index')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        File::delete('image/' . $slide->slide);
        $slide->delete();
        return redirect()->route('slide.index')->with('message', 'Data Deleted Successfully');
    }

    public function updateStatus(Slide $slide)
    {
        $dataStatus = $slide->status;

        if ($dataStatus == 0) {
            $slide->update([
                'status' => 1
            ]);
        } else {
            $slide->update([
                'status' => 0
            ]);
        }

        return redirect()->route('slide.index')->with('message', 'Data Status Updated Successfully');
    }
}