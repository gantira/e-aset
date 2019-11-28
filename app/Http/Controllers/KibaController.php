<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kiba;
use Session;
use Auth;
use App\User;
use App\Notification;
use App\Profile;
use App\Upload;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
Use Carbon\Carbon;

class KibaController extends Controller
{
    public function index()
    {
        $data['kode_barang'] = '01.'.(Kiba::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('kiba.index', $data);
    }

    public function create()
    {
    	return view('kiba.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = $request->tanggal;
        
    	Kiba::create($data);
        Session::flash('message', 'Tambah Aset Kib A Berhasil!');
    	return back();
    }

    public function edit($id)
    {
        $data['kode_barang'] = '01.'.(Kiba::max('id')+1).'.'.Carbon::now()->format('d.m.y');
        $data['user'] = User::findOrfail(Auth::user()->id);
        $data['kiba'] = Kiba::findOrfail($id);
        return view('kiba.edit', $data);
    }

    public function destroy($id)
    {
        $data = Kiba::findOrfail($id);
        $data->delete();
        Session::flash('message', 'Aset '.$data->nama_barang.' telah dihapus!');
        return back();
    }


    public function update(Request $request, $id)
    {
        $data = Kiba::findOrfail($id);
        $data->fill($request->all());
        $data->save();

        return redirect('kiba');
    }

    public function upload(Request $request)
    {

        if($request->hasFile('xls')){
            $path = $request->file('xls')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            $kode_barang = Kiba::max('id');
            $i=1;
            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            
                            $insert[] = [
                                'user_id' => Auth::user()->id, 
                                'kode_barang' => '01.'.($kode_barang+$i).'.'.Carbon::now()->format('d.m.y'),
                                'nama_barang' => $v['nama_barang'],
                                'register' => $v['register'],
                                'luas_m2' => $v['luas_m2'],
                                'tanah_pengadaan' => $v['tanah_pengadaan'],
                                'status_tanah' => $v['status_tanah'],
                                'letak_alamat' => $v['letak_alamat'],
                                'penggunaan' => $v['penggunaan'],
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
                    $destinationPath = 'upload/xls';
                    $fileName = Auth::user()->id . '_' . time().'.'.$request->xls->getClientOriginalExtension();
                    $request->file('xls')->move($destinationPath, $fileName);

                    Upload::insert(['user_id'=>Auth::user()->id, 'file_name'=>$fileName, 'created_at'=> Carbon::now()]);
                    Kiba::insert($insert);

                    return back()->with('message','Upload dokumen kiba berhasil.');
                }

            }

        }
        return back()->with('message','Please Check your file, Something is wrong there.');
    }

    // Admin
    
    public function indexAdmin()
    {
        $data['kiba'] = Kiba::where('status', '!=', 2)->groupBy('user_id')->get();

        return view('admin.kiba.index', $data);
    }

    public function needapprove($id)
    {
        $data['kiba'] = Kiba::where('status', '!=', 2)->whereUserId($id)->get();

        return view('admin.kiba.detail', $data);
    }

    public function status($acc, $id)
    {
        $data = Kiba::findOrfail($id);
        $data->status = $acc;
        $data->komentar = '';
        $data->save();

        Session::flash('message', 'Aset '.$data->nama_barang. ($acc == 2 ? ' Approved': ' Ignored'));
        return back();
    }

    public function ignore(Request $request)
    {
        $data = Kiba::findOrfail($request->input('id'));
        $data->komentar = $request->input('komentar');
        $data->status = 3;
        $data->save();

        Notification::create(['user_id' => $request->id, 'pesan' => 'Ignored Aset Kib-A '.$request->komentar]);

        return redirect('admin/kiba')->with('message', 'Aset '.$data->nama_barang.' Ignored!');
    }

    public function getData(Request $request)
    {
        $data = Kiba::findOrfail($request->input('id'));

        return json_encode($data);
    }

    public function view(Request $request)
    {
        $data = Kiba::findOrfail($request->input('id'));

        return json_encode($data);
    }


}
