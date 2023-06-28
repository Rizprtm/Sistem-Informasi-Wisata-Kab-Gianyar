<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class C_Session extends Controller
{
    function index(){
        return view('Admin.login');
    }
    function login(Request $request){
        Session::flash('email',$request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',

        ]);
        $infologin = [
            'email' =>$request->email,
            'password' =>$request->password
        ];
        if(Auth::attempt($infologin)){
            //
            return redirect('/dashboard')->with(['success' => 'Login Berhasil']);
        }else{
            //
            return redirect('login')->withErrors(['gagal' => 'email atau password salah']);
        }
    }
    function logout(){
        Auth::logout();
        return redirect('login')->with(['success' => 'Berhasil logout']);
    }
}
