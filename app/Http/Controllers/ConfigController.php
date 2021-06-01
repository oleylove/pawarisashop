<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $config = Config::first();
            return view('config.index', compact('config'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            $config = Config::findOrFail($id);
            return view('config.edit', compact('config'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $requestData = $request->all();
            if ($request->hasFile('bbl_logo')) {
                $requestData['bbl_logo'] = $request->file('bbl_logo')->store('config', 'public');
                if(Storage::exists('public/'.$request['bbl_logo_old'])){
                    Storage::delete('public/'.$request['bbl_logo_old']);
                }
            }
            if ($request->hasFile('kbsnk_logo')) {
                $requestData['kbsnk_logo'] = $request->file('kbsnk_logo')->store('config', 'public');
                if(Storage::exists('public/'.$request['kbsnk_logo_old'])){
                    Storage::delete('public/'.$request['kbsnk_logo_old']);
                }
            }
            if ($request->hasFile('scb_logo')) {
                $requestData['scb_logo'] = $request->file('scb_logo')->store('config', 'public');
                if(Storage::exists('public/'.$request['scb_logo_old'])){
                    Storage::delete('public/'.$request['scb_logo_old']);
                }
            }
            if ($request->hasFile('bay_logo')) {
                $requestData['bay_logo'] = $request->file('bay_logo')->store('config', 'public');
                if(Storage::exists('public/'.$request['bay_logo_old'])){
                    Storage::delete('public/'.$request['bay_logo_old']);
                }
            }
            if ($request->hasFile('logo')) {
                $requestData['logo'] = $request->file('logo')->store('config', 'public');
                if(Storage::exists('public/'.$request['logo_old'])){
                    Storage::delete('public/'.$request['logo_old']);
                }
            }

            $config = Config::findOrFail($id);
            $config->update($requestData);

            return redirect('config')->with('flash_message', 'Config updated!');

        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
