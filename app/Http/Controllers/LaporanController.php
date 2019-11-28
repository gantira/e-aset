<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\User;
use App\Laporan;
use App\Kiba;
use App\Kibb;
use App\Kibc;
use App\Perpustakaan;
use App\TumbuhanHewan;
use App\Kesenian;
use App\Profile;

class LaporanController extends Controller
{
    public function index()
    {
        $data['user'] = User::findOrfail(Auth::user()->id);
        return view('admin.laporan.index', $data);
    }

    public function laporan(Request $request)
    {
    	$data['periode'] = $request->input('periode');
        $data['tahun'] = $request->input('tahun');

        $data['user'] = User::findOrfail(Auth::user()->id);
        $count = count(User::all());
        $data['yayasan'] = User::skip(2)->take($count)->get();
    	$data['kiba'] = Kiba::laporan($data['periode'], $data['tahun'])->get();
    	$data['kibb'] = Kibb::laporan($data['periode'], $data['tahun'])->get();
        $data['kibc'] = Kibc::laporan($data['periode'], $data['tahun'])->get();
        $data['perpustakaan'] = Perpustakaan::laporan($data['periode'], $data['tahun'])->get();
        $data['tumbuhanhewan'] = TumbuhanHewan::laporan($data['periode'], $data['tahun'])->get();
        $data['kesenian'] = Kesenian::laporan($data['periode'], $data['tahun'])->get();
        
    	return view('admin.laporan.laporan', $data);
    }

    public function laporan_detail($id, $periode, $tahun)
    {
        $data['periode'] = $periode;
        $data['tahun'] = $tahun;

        $data['user'] = User::findOrfail($id);
        $data['kiba'] = Kiba::laporan_detail($id, $data['periode'], $data['tahun'])->get();
        $data['kibb'] = Kibb::laporan_detail($id, $data['periode'], $data['tahun'])->get();
        $data['kibc'] = Kibc::laporan_detail($id, $data['periode'], $data['tahun'])->get();
        $data['perpustakaan'] = Perpustakaan::laporan_detail($id, $data['periode'], $data['tahun'])->get();
        $data['tumbuhanhewan'] = TumbuhanHewan::laporan_detail($id, $data['periode'], $data['tahun'])->get();
        $data['kesenian'] = Kesenian::laporan_detail($id, $data['periode'], $data['tahun'])->get();

        return view('admin.laporan.laporan_detail', $data);
    }

    public function kiba()
    {
        $count = User::count();
        $take = $count - 2;
        $data['user'] = User::skip(2)->take($take)->get();

        return view('admin.laporan.kiba', $data);
    }

    public function kibb()
    {
        $count = User::count();
        $take = $count - 2;
        $data['user'] = User::skip(2)->take($take)->get();

        return view('admin.laporan.kibb', $data);
    }

    public function kibc()
    {
        $count = User::count();
        $take = $count - 2;
        $data['user'] = User::skip(2)->take($take)->get();

        return view('admin.laporan.kibc', $data);
    }

    public function perpustakaan()
    {
        $count = User::count();
        $take = $count - 2;
        $data['user'] = User::skip(2)->take($take)->get();

        return view('admin.laporan.perpustakaan', $data);
    }

    public function kesenian()
    {
        $count = User::count();
        $take = $count - 2;
        $data['user'] = User::skip(2)->take($take)->get();

        return view('admin.laporan.kesenian', $data);
    }

    public function tumbuhanhewan()
    {
        $count = User::count();
        $take = $count - 2;
        $data['user'] = User::skip(2)->take($take)->get();

        return view('admin.laporan.tumbuhanhewan', $data);
    }
}
