<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TumbuhanHewan;
use App\User;
use App\Notification;
use Session;
use Auth;
use App\Profile;
use Carbon\Carbon;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class TumbuhanHewanController extends Controller
{

    public function index()
    {
        $data['kode_barang'] = '05.'.(TumbuhanHewan::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('tumbuhanhewan.index', $data);
    }

    public function create()
    {
        return view('tumbuhanhewan.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = $request->tanggal;

        TumbuhanHewan::create($data);
        Session::flash('message', 'Tambah Aset Tumbuhan dan Hewan Berhasil!');
        return back();
    }

    public function edit($id)
    {
        $data['kode_barang'] = '05.'.(TumbuhanHewan::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['tumbuhanhewan'] = TumbuhanHewan::findOrfail($id);
        return view('tumbuhanhewan.edit', $data);
    }

    public function destroy($id)
    {
        $data = TumbuhanHewan::findOrfail($id);
        $data->delete();
        Session::flash('message', 'Aset '.$data->nama_tumbuhanhewan.' telah dihapus!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = TumbuhanHewan::findOrfail($id);
        $data->fill($request->all());
        $data->save();

        return redirect('tumbuhanhewan');
    }

    public function upload(Request $request)
    {
        $rules = array(
            'xls' => 'required|mimes:xls'
        );

       if($request->hasFile('xls')){
            $path = $request->file('xls')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            $kode_barang = TumbuhanHewan::max('id');
            $i=1;

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                                'user_id' => Auth::user()->id, 
                                'kode_tumbuhanhewan' => '05.'.($kode_barang+$i).'.'.Carbon::now()->format('d.m.y'),
                                'nama_tumbuhanhewan' => $v['nama_tumbuhanhewan'],
                                'nomor_register' => $v['nomor_register'],
                                'jenis_tumbuhanhewan' => $v['jenis_tumbuhanhewan'],
                                'ukuran' => $v['ukuran'],
                                'jumlah' => $v['jumlah'],
                                'asal_usul' => $v['asal_usul'],
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
                    TumbuhanHewan::insert($insert);
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
        $data['tumbuhanhewan'] = TumbuhanHewan::where('status', '!=', 2)->groupBy('user_id')->get();

        return view('admin/tumbuhanhewan.index', $data);
    }

    public function needapprove($id)
    {
        $data['tumbuhanhewan'] = TumbuhanHewan::where('status', '!=', 2)->whereUserId($id)->get();

        return view('admin.tumbuhanhewan.detail', $data);
    }

    public function status($acc, $id)
    {
        $data = TumbuhanHewan::findOrfail($id);
        $data->status = $acc;
        $data->komentar = '';
        $data->save();

        Session::flash('message', 'Aset '.$data->nama_tumbuhanhewan. ($acc == 2 ? ' Approved': ' Ignored'));
        return back();
    }

    public function ignore(Request $request)
    {
        $data = TumbuhanHewan::findOrfail($request->input('id'));
        $data->komentar = $request->input('komentar');
        $data->status = 3;
        $data->save();

        Notification::create(['user_id' => $request->id, 'pesan' => 'Ignored Aset Tumbuhan&Hewan '.$request->komentar]);

        Session::flash('message', 'Aset '.$data->nama_tumbuhanhewan.' Ignored!');
        return redirect('admin/tumbuhanhewan');
    }

    public function getData(Request $request)
    {
        $data = TumbuhanHewan::findOrfail($request->input('id'));

        return json_encode($data);
    }

    public function view(Request $request)
    {
        $data = TumbuhanHewan::findOrfail($request->input('id'));

        return json_encode($data);
    }

}
