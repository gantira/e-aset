<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Profile;
use Auth;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $count = count(User::all());
        $data['arsip'] = User::skip(2)->take($count)->get();
        
    	return view('admin.arsip.index', $data);
    }

    public function detail($id)
    {
        $data['user'] = User::findOrFail($id);
        $data['profile'] = Profile::all();
        return view('admin.arsip.detail', $data);
    }
}
