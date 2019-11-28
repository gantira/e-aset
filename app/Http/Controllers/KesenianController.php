<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kesenian;
use App\Notification;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use App\Profile;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class KesenianController extends Controller
{
    public function index()
    {
        $data['kode_barang'] = '06.'.(Kesenian::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('kesenian.index', $data);
    }

    public function create()
    {
        return view('kesenian.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = $request->tanggal;

        Kesenian::create($data);
        Session::flash('message', 'Tambah Aset Kib A Berhasil!');
        return back();
    }

    public function edit($id)
    {
        $data['kode_barang'] = '06.'.(Kesenian::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['kesenian'] = Kesenian::findOrfail($id);
        return view('kesenian.edit', $data);
    }

    public function destroy($id)
    {
        $data = Kesenian::findOrfail($id);
        $data->delete();
        Session::flash('message', 'Aset '.$data->nama_barang.' telah dihapus!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = Kesenian::findOrfail($id);
        $data->fill($request->all());
        $data->save();

        return redirect('kesenian');
    }

    public function upload(Request $request)
    {
        $rules = array(
            'xls' => 'required|mimes:xls'
        );

       if($request->hasFile('xls')){
            $path = $request->file('xls')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            $kode_barang = Kesenian::max('id');
            $i=1;

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                                'user_id' => Auth::user()->id, 
                                'kode_barang' => '06.'.($kode_barang+$i).'.'.Carbon::now()->format('d.m.y'),
                                'nama_barang' => $v['nama_barang'],
                                'nomor_register' => $v['nomor_register'],
                                'jenis_barang' => $v['jenis_barang'],
                                'ukuran' => $v['ukuran'],
                                'jumlah' => $v['jumlah'],
                                'aktivasi_dana' => $v['aktivasi_dana'],
                                'tanggal' => $v['tanggal'],
                                'harga' => $v['harga'],
                                'keterangan' => $v['keterangan'],
                                'created_at' => $v['tanggal'],
                            ];
                        $i++;
                        }
                    }
                }

                
                if(!empty($insert)){
                    Kesenian::insert($insert);
                    Session::flash('message', 'Upload dokumen pencatatan inventaris berhasil!');
                    return back();
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }


    // Admin
    
    public function indexAdmin()
    {
        $data['kesenian'] = Kesenian::where('status', '!=', 2)->groupBy('user_id')->get();

        return view('admin/kesenian.index', $data);
    }

    public function needapprove($id)
    {
        $data['kesenian'] = Kesenian::where('status', '!=', 2)->whereUserId($id)->get();

        return view('admin.kesenian.detail', $data);
    }

    public function status($acc, $id)
    {
        $data = Kesenian::findOrfail($id);
        $data->status = $acc;
        $data->komentar = '';
        $data->save();

        Session::flash('message', 'Aset '.$data->nama_barang. ($acc == 2 ? ' Approved': ' Ignored'));
        return back();
    }

    public function ignore(Request $request)
    {
        $data = Kesenian::findOrfail($request->input('id'));
        $data->komentar = $request->input('komentar');
        $data->status = 3;
        $data->save();

        Notification::create(['user_id' => $request->id, 'pesan' => 'Ignored Aset Kesenian '.$request->komentar]);

        Session::flash('message', 'Aset '.$data->nama_barang.' Ignored!');
        return redirect('admin/kesenian');
    }

    public function getData(Request $request)
    {
        $data = Kesenian::findOrfail($request->input('id'));

        return json_encode($data);
    }

    public function view(Request $request)
    {
        $data = Kesenian::findOrfail($request->input('id'));

        return json_encode($data);
    }
}
