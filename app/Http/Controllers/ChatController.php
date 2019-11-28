<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chat;

class ChatController extends Controller
{
    public function store(Request $request)
    {
    	$data = Chat::create($request->all());

    	return json_encode($data);
    }
}
