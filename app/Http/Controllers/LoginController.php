<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

class LoginController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ];

        if(Auth::attempt($credentials)){

            /*
            Jika username dan password match, lakukan logika if berikut ini.
            kalau user belum mengaktifkan accountnya, maka logout, dan tampilka message untuk mengaktifkannya
            */
            if (Auth::user()->email == 'admin' || Auth::user()->email == 'kabid' ) {
                return redirect('admin/dashboard');
            }else{
                return redirect('dashboard');
            }
        }
        else {
                Session::flash('login', 'Wrong Username and Password');
                return back();
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
