<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Perpustakaan;
use App\User;
use App\Notification;
use Session;
use Auth;
use App\Profile;
use Carbon\Carbon;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class PerpustakaanController extends Controller
{

    public function index()
    {
        $data['kode_barang'] = '04.'.(Perpustakaan::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('perpustakaan.index', $data);
    }

    public function create()
    {
        return view('perpustakaan.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = $request->tanggal;

        Perpustakaan::create($data);
        Session::flash('message', 'Tambah Aset Perpustakaan Berhasil!');
        return back();
    }

    public function edit($id)
    {
        $data['kode_barang'] = '04.'.(Perpustakaan::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['perpustakaan'] = Perpustakaan::findOrfail($id);
        return view('perpustakaan.edit', $data);
    }

    public function destroy($id)
    {
        $data = Perpustakaan::findOrfail($id);
        $data->delete();
        Session::flash('message', 'Aset '.$data->nama_buku.' telah dihapus!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = Perpustakaan::findOrfail($id);
        $data->fill($request->all());
        $data->save();

        return redirect('perpustakaan');
    }

    public function upload(Request $request)
    {
        $rules = array(
            'xls' => 'required|mimes:xls'
        );

       if($request->hasFile('xls')){
            $path = $request->file('xls')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            $kode_barang = Perpustakaan::max('id');
            $i=1;

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                                'user_id' => Auth::user()->id, 
                                'kode_buku' => '04.'.($kode_barang+$i).'.'.Carbon::now()->format('d.m.y'),
                                'nama_buku' => $v['nama_buku'],
                                'pengarang' => $v['pengarang'],
                                'penerima' => $v['penerima'],
                                'keluar' => $v['keluar'],
                                'sisa' => $v['sisa'],
                                'tanggal' => $v['tanggal'],
                                'keterangan' => $v['keterangan'],
                                'created_at' => $v['tanggal'],
                            ];
                        $i++;
                        }
                    }
                }

                
                if(!empty($insert)){
                    Perpustakaan::insert($insert);
                    Session::flash('message', 'Upload dokumen pembelian buku berhasil!');
                    return back();
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }


    // Admin
    
    public function indexAdmin()
    {
        $data['perpustakaan'] = Perpustakaan::where('status', '!=', 2)->groupBy('user_id')->get();

        return view('admin/perpustakaan.index', $data);
    }

    public function needapprove($id)
    {
        $data['perpustakaan'] = Perpustakaan::where('status', '!=', 2)->whereUserId($id)->get();

        return view('admin.perpustakaan.detail', $data);
    }

    public function status($acc, $id)
    {
        $data = Perpustakaan::findOrfail($id);
        $data->status = $acc;
        $data->komentar = '';
        $data->save();

        Session::flash('message', 'Aset '.$data->nama_buku. ($acc == 2 ? ' Approved': ' Ignored'));
        return back();
    }

    public function ignore(Request $request)
    {
        $data = Perpustakaan::findOrfail($request->input('id'));
        $data->komentar = $request->input('komentar');
        $data->status = 3;
        $data->save();

        Notification::create(['user_id' => $request->id, 'pesan' => 'Ignored Aset Perpustakaan '.$request->komentar]);

        Session::flash('message', 'Aset '.$data->nama_buku.' Ignored!');
        return redirect('admin/perpustakaan');
    }

    public function getData(Request $request)
    {
        $data = Perpustakaan::findOrfail($request->input('id'));

        return json_encode($data);
    }

    public function view(Request $request)
    {
        $data = Perpustakaan::findOrfail($request->input('id'));

        return json_encode($data);
    }
    
}
