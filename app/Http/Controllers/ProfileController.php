<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\User;
use Session;
use Auth;

class ProfileController extends Controller
{

    public function edit()
    {
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['profile'] = Profile::findOrFail(Auth::user()->id);

    	return view('profile.edit', $data);
    }

    public function update(Request $request, $id)
    {
    	$data = Profile::findOrFail($id);
        $data->fill($request->all());
    	$data->save();

        Session::flash('message', 'Update Berhasil!');
    	return back();
    }
}
