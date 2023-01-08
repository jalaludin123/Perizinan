<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index')->with([
            'title' => 'Data Setting',
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::first();

        if ($setting) {
            if ($request->hasFile('logo')) {
                File::delete('image/logo/' . $setting->logo);
                $logo = $request->file('logo');
                $logoName = time() . $logo->hashName();
                $logo->move('image/logo', $logoName);

                $setting->update([
                    'name_website' => $request->name,
                    'url_website' => $request->url,
                    'phone_website' => $request->phone,
                    'email_website' => $request->email,
                    'wa_website' => $request->wa,
                    'address_website' => $request->address,
                    'fb_website' => $request->fb,
                    'ig_website' => $request->ig,
                    'youtube_website' => $request->yt,
                    'twitter_website' => $request->twet,
                    'logo' => $logoName
                ]);
            } else {
                $setting->update([
                    'name_website' => $request->name,
                    'url_website' => $request->url,
                    'phone_website' => $request->phone,
                    'email_website' => $request->email,
                    'wa_website' => $request->wa,
                    'address_website' => $request->address,
                    'fb_website' => $request->fb,
                    'ig_website' => $request->ig,
                    'youtube_website' => $request->yt,
                    'twitter_website' => $request->twet,
                ]);
            }
            return redirect()->back()->with('message', 'Data Setting Updated');
        } else {
            $logo = $request->file('logo');
            $logoName = time() . $logo->hashName();
            $logo->move('image/logo', $logoName);
            Setting::create([
                'name_website' => $request->name,
                'url_website' => $request->url,
                'phone_website' => $request->phone,
                'email_website' => $request->email,
                'wa_website' => $request->wa,
                'address_website' => $request->address,
                'fb_website' => $request->fb,
                'ig_website' => $request->ig,
                'youtube_website' => $request->yt,
                'twitter_website' => $request->twet,
                'logo' => $logoName
            ]);

            return redirect()->back()->with('message', 'Data Setting Created');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}