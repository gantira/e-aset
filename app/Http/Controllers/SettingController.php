<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

class SettingController extends Controller
{

    public function index()
    {	
    	$data['setting'] = Setting::findOrFail(1);
        
    	return view('admin.setting.index', $data);
    }

    public function update(Request $request, $id)
    {
    	$data = Setting::findOrfail($id);
        $data->fill($request->all());
        $data->save();

    	return back()->with('message', 'Setting Updated!');
    }

}
