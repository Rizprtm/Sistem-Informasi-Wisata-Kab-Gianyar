<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Review;
class C_Review extends Controller
{
    public function store(Request $request){
        
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'komentar' => $request->komentar
        ];

        M_Review::create($data);
        return view('Blog.review',$data);
    }
}
