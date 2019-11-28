<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Sertifikat;
use Auth;
use App\Http\Requests\SertifikatRequest;

class SertifikatController extends Controller
{

    public function index()
    {	
    	$data['user'] = User::findOrfail(Auth::user()->id);
    	return view('sertifikat.index', $data);
    }

    public function store(SertifikatRequest $request)
    {
    	$destinationPath = 'upload/sertifikat/';
        $fileName = Auth::user()->id . '_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move($destinationPath, $fileName);

        $data = $request->all();
        $data['file'] = $destinationPath . $fileName;

    	Sertifikat::create($data);

    	return back()->with('message', 'Upload File Berhasil!');
    }

    public function edit($id)
    {
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['sertifikat'] = Sertifikat::findOrfail($id);
        return view('sertifikat.edit', $data);

    }

    public function update(SertifikatRequest $request, $id)
    {
        $destinationPath = 'upload/sertifikat/';
        $fileName = Auth::user()->id . '_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move($destinationPath, $fileName);

        $data = Sertifikat::findOrfail($id);
        $data->fill($request->all());
        $data->file = $destinationPath . $fileName;
        $data->save();

        return redirect('sertifikat')->with('message', 'Edit Berhasil!');
    }

    public function destroy($id)
    {
        $data = Sertifikat::findOrfail($id);
        $data->delete();

        return back()->with('message', 'Sertifikat '. $data->id . ' telah dihapus!');

    }

    public function indexAdmin()
    {
        $data['sertifikat'] = Sertifikat::all();

        return view('admin.sertifikat.index', $data);
    }
}
