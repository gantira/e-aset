<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;
use App\Notifications\SendAktivasiEmail;
use Session;
use App\Http\Requests\UserRequest;
use App\Setting;

class UserController extends Controller
{

    public function index()
    {   
        $data['user'] = User::whereActive('0')->get();

        return view('admin.user.index', $data); 

    }

    public function store(UserRequest $request)
    {
    	$input = [
    		'no_id' => $request->input('no_id'),
    		'no_hp' => $request->input('no_hp'),
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password'))
    	];

    	$user = User::create($input);
        Profile::create();

        if (Setting::value('email')) {
            $user->notify(new SendAktivasiEmail($user));
        }
        
        Session::flash('message', 'Terima kasih sudah mendaftar! Silahkan cek email untuk aktivasi akun anda.');
    	return redirect('/'); 
    }

    public function arsip($id)
    {
        $data['user'] = User::findOrFail($id);
        $data['profile'] = Profile::all();
        return view('admin.arsip.index', $data);
    }

    public function aktivasi($email, $str)
    {
        User::where('email', $email)->update(['active'=>1]);
        Session::flash('message', 'Aktivasi email ' . $email . ' berhasil dilakukan! Silahkan login.');
        return redirect('/'); 
    }

    public function approve($id)
    {
        User::where('id', $id)->update(['active' => true]);
        $user = User::findOrFail($id);
        Session::flash('message', $user->email . ' telah di-Approve!');
        return back();
    }

    public function accall()
    {
        User::whereActive(0)->update(['active'=>1]);
        Session::flash('message', 'Semua Akun telah di-Approve!');
        return back();

    }

}
