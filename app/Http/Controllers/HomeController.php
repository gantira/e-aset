<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Profile;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
    	$count = count(Profile::all());
		$data['user'] = User::skip(2)->take($count)->get();
	    return view('frontend', $data);
    }

    public function error()
    {
    	return view('errors.404');
    }
}
