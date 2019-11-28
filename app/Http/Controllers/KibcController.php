<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kibc;
use App\User;
use App\Notification;
use Session;
use Carbon\Carbon;
use Auth;
use App\Profile;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class KibcController extends Controller
{
    public function index()
    {
        $data['kode_barang'] = '03.'.(Kibc::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('kibc.index', $data);
    }

    public function create()
    {
        return view('kibc.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = $request->tanggal;

        Kibc::create($data);
        Session::flash('message', 'Tambah Aset Kib A Berhasil!');
        return back();
    }

    public function edit($id)
    {
        $data['kode_barang'] = '03.'.(Kibc::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['kibc'] = Kibc::findOrfail($id);
        return view('kibc.edit', $data);
    }

    public function destroy($id)
    {
        $data = Kibc::findOrfail($id);
        $data->delete();
        Session::flash('message', 'Aset '.$data->nama_bangunan.' telah dihapus!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = Kibc::findOrfail($id);
        $data->fill($request->all());
        $data->save();

        return redirect('kibc');
    }

    public function upload(Request $request)
    {
        $rules = array(
            'xls' => 'required|mimes:xls'
        );

       if($request->hasFile('xls')){
            $path = $request->file('xls')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            $kode_barang = Kibc::max('id');
            $i=1;

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                                'user_id' => Auth::user()->id, 
                                'kode_bangunan' => '03.'.($kode_barang+$i).'.'.Carbon::now()->format('d.m.y'),
                                'nama_bangunan' => $v['nama_bangunan'],
                                'register' => $v['register'],
                                'kondisi' => $v['kondisi'],
                                'konstruksi1' => $v['konstruksi1'],
                                'konstruksi2' => $v['konstruksi2'],
                                'luas_m2' => $v['luas_m2'],
                                'letak_alamat' => $v['letak_alamat'],
                                'status_tanah' => $v['status_tanah'],
                                'nomor_kode_tanah' => $v['nomor_kode_tanah'],
                                'asal_usul' => $v['asal_usul'],
                                'harga' => $v['harga'],
                                'tanggal_pembangunan' => $v['tanggal_pembangunan'],
                                'keterangan' => $v['keterangan'],
                                'created_at' => $v['tanggal_pembangunan'],
                            ];
                        $i++;
                        }
                    }
                }

                
                if(!empty($insert)){
                    Kibc::insert($insert);
                    Session::flash('message', 'Upload dokumen kibc berhasil!');
                    return back();
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }


    // Admin
    
    public function indexAdmin()
    {
        $data['kibc'] = Kibc::where('status', '!=', 2)->groupBy('user_id')->get();

        return view('admin/kibc.index', $data);
    }

    public function needapprove($id)
    {
        $data['kibc'] = Kibc::where('status', '!=', 2)->whereUserId($id)->get();

        return view('admin.kibc.detail', $data);
    }
    
    public function status($acc, $id)
    {
        $data = Kibc::findOrfail($id);
        $data->status = $acc;
        $data->komentar = '';
        $data->save();

        Session::flash('message', 'Aset '.$data->nama_bangunan. ($acc == 2 ? ' Approved': ' Ignored'));
        return back();
    }


    public function ignore(Request $request)
    {
        $data = Kibc::findOrfail($request->input('id'));
        $data->komentar = $request->input('komentar');
        $data->status = 3;
        $data->save();

        Notification::create(['user_id' => $request->id, 'pesan' => 'Ignored Aset Kib-C '.$request->komentar]);

        Session::flash('message', 'Aset '.$data->nama_bangunan.' Ignored!');
        return redirect('admin/kibc');
    }

    public function getData(Request $request)
    {
        $data = Kibc::findOrfail($request->input('id'));

        return json_encode($data);
    }

    public function view(Request $request)
    {
        $data = Kibc::findOrfail($request->input('id'));

        return json_encode($data);
    }

}
