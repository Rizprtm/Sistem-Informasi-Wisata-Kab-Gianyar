<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blog extends Controller
{
    public function home(){
        return view('MainBerita');
    }
    public function contact(){
        return view('contact');
    }
}
