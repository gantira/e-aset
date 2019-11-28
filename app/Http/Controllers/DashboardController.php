<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Kiba;
use App\Kibb;
use App\Kibc;
use App\Perpustakaan;
use App\TumbuhanHewan;
use App\Kesenian;
use App\Chat;
use Auth;
use App\Profile;
use Charts;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$data['user'] = User::findOrFail(Auth::user()->id);

        $kiba = Kiba::where('user_id', Auth::user()->id)->count();
        $kibb = Kibb::where('user_id', Auth::user()->id)->count();
        $kibc = Kibc::where('user_id', Auth::user()->id)->count();
        $perpustakaan = Perpustakaan::where('user_id', Auth::user()->id)->count();
        $tumbuhanhewan = TumbuhanHewan::where('user_id', Auth::user()->id)->count();
        $kesenian = Kesenian::where('user_id', Auth::user()->id)->count();
        $data['chat'] = Chat::orderBy('id', 'desc')->get();

        

        $data['kiba'] = Charts::database(Kiba::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();

        $data['kibb'] = Charts::database(Kibb::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['kibc'] = Charts::database(Kibc::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['perpustakaan'] = Charts::database(Perpustakaan::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['kesenian'] = Charts::database(Kesenian::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['tumbuhanhewan'] = Charts::database(TumbuhanHewan::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();


        $data['chart2'] = Charts::create('pie', 'c3')
                            ->title('My Aset')
                            ->labels(['Kib A', 'Kib B', 'Kib C', 'Perpustakaan', 'Tumbuhan dan Hewan', 'Kesenian'])
                            ->values([$kiba, $kibb, $kibc, $perpustakaan, $tumbuhanhewan, $kesenian])
                            ->elementlabel('Total')
                            ->responsive(true);

   		return view('dashboard.index', $data);
    }

    public function indexAdmin()
    {
        $data['kiba'] = Charts::database(Kiba::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();

        $data['kibb'] = Charts::database(Kibb::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['kibc'] = Charts::database(Kibc::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['perpustakaan'] = Charts::database(Perpustakaan::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['kesenian'] = Charts::database(Kesenian::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();
                    
        $data['tumbuhanhewan'] = Charts::database(TumbuhanHewan::all(), 'bar', 'c3')
                              ->elementLabel("Total")
                              ->responsive(true)
                              ->groupByYear();

        $data['chat'] = Chat::orderBy('id', 'desc')->get();

   		return view('admin/dashboard.index', $data);
    }
}
