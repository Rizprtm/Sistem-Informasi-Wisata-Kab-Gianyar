<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Berita;
use App\Models\M_Destinasi;
use App\Models\M_Review;
use App\Models\M_LogActivity;
use DataTables;
class dashboard extends Controller
{
    public function home(){
        $data['destinasi'] = M_Destinasi::get();
        $data['berita'] = M_Berita::get();
        $data['review'] = M_Review::get();
        $data['log'] = M_LogActivity::get();
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

    public function userlist(){
        return view('Admin.user-list');
    }

    public function logactivity(Request $request){
        if ($request->ajax()) {
            $data = M_LogActivity::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function(){
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Admin.logactivity');
        
    }

}
