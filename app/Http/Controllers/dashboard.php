<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Berita;
use App\Models\M_Destinasi;
use App\Models\M_Review;
class dashboard extends Controller
{
    public function home(){
        $data['destinasi'] = M_Destinasi::get();
        $data['berita'] = M_Berita::get();
        $data['review'] = M_Review::get();
        return view('Admin.dashboard',$data);
    }
    public function login(){
        return view('Admin.login');
    }
    /**
     * Berita
     */
    public function berita(){
        return view('Admin.berita');
    }

    public function input_berita(){
        return view('Admin.input-news');
    }
    /**
     * Destinasi
     */
    public function destinasi(){
        return view('Admin.destinasi');
    }

    public function input_destinasi(){
        return view('Admin.input-destinasi');
    }

    public function userlist(){
        return view('Admin.user-list');
    }

    public function input_user(){
        return view('Admin.input-user');
    }

}
