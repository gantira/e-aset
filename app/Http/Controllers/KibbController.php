<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kibb;
use App\User;
use App\Notification;
use Session;
use Auth;
use Carbon\Carbon;
use App\Profile;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class KibbController extends Controller
{
    public function index()
    {
        $data['kode_barang'] = '02.'.(Kibb::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('kibb.index', $data);
    }

    public function create()
    {
        return view('kibb.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = $request->tanggal;

        Kibb::create($data);
        Session::flash('message', 'Tambah Aset Kib A Berhasil!');
        return back();
    }

    public function edit($id)
    {
        $data['kode_barang'] = '02.'.(Kibb::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['kibb'] = Kibb::findOrfail($id);
        return view('kibb.edit', $data);
    }

    public function destroy($id)
    {
        $data = Kibb::findOrfail($id);
        $data->delete();
        Session::flash('message', 'Aset '.$data->nama_barang.' telah dihapus!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = Kibb::findOrfail($id);
        $data->fill($request->all());
        $data->save();

        return redirect('kibb');
    }

    public function upload(Request $request)
    {
        $rules = array(
            'xls' => 'required|mimes:xls'
        );

       if($request->hasFile('xls')){
            $path = $request->file('xls')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            $kode_barang = Kibb::max('id');
            $i=1;

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                                'user_id' => Auth::user()->id, 
                                'kode_barang' => '02.'.($kode_barang+$i).'.'.Carbon::now()->format('d.m.y'),
                                'nama_barang' => $v['nama_barang'],
                                'register' => $v['register'],
                                'ukuran' => $v['ukuran'],
                                'bahan' => $v['bahan'],
                                'nomor' => $v['nomor'],
                                'asal_usul' => $v['asal_usul'],
                                'harga' => $v['harga'],
                                'tanggal' => $v['tanggal'],
                                'keterangan' => $v['keterangan'],
                                'created_at' => $v['tanggal'],
                            ];
                        $i++;
                        }
                    }
                }

                
                if(!empty($insert)){
                    Kibb::insert($insert);
                    Session::flash('message', 'Upload dokumen kibb berhasil!');
                    return back();
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }


    // Admin
    
    public function indexAdmin()
    {
        $data['kibb'] = Kibb::where('status', '!=', 2)->groupBy('user_id')->get();

        return view('admin/kibb.index', $data);
    }

    public function needapprove($id)
    {
        $data['kibb'] = Kibb::where('status', '!=', 2)->whereUserId($id)->get();

        return view('admin.kibb.detail', $data);
    }

    public function status($acc, $id)
    {
        $data = Kibb::findOrfail($id);
        $data->status = $acc;
        $data->komentar = '';
        $data->save();

        Session::flash('message', 'Aset '.$data->nama_barang. ($acc == 2 ? ' Approved': ' Ignored'));
        return back();
    }

    public function ignore(Request $request)
    {
        $data = Kibb::findOrfail($request->input('id'));
        $data->komentar = $request->input('komentar');
        $data->status = 3;
        $data->save();

        Notification::create(['user_id' => $request->id, 'pesan' => 'Ignored Aset Kib-B '.$request->komentar]);

        Session::flash('message', 'Aset '.$data->nama_barang.' Ignored!');
        return redirect('admin/kibb');
    }

    public function getData(Request $request)
    {
        $data = Kibb::findOrfail($request->input('id'));

        return json_encode($data);
    }

    public function view(Request $request)
    {
        $data = Kibb::findOrfail($request->input('id'));

        return json_encode($data);
    }


}