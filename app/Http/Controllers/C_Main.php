<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Berita;
use App\Models\M_KategoriBerita;
use App\Models\M_Destinasi;
use App\Models\M_KategoriDestinasi;
use App\Models\M_Review;
class C_Main extends Controller
{
    public function index(){
        $data['berita'] = M_Berita::with('kategori')->where('status','Aktif')->orderBy('id','desc')->paginate(4);
        $data['destinasi'] = M_Destinasi::with('kategori')->where('status','Aktif')->orderBy('id','desc')->paginate(3);
        $data['review'] = M_Review::orderBy('id','desc')->paginate(6);
        
        return view('index',$data);
    }
    public function review(Request $request){
        return view('Blog.review');
    }
    public function storereview(Request $request){
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'komentar' => $request->komentar
        ];

        M_Review::create($data);
        return view('Blog.review',$data);
    }
    public function berita(Request $request)
    {
        $judul = $request->judul;
        $kategori = $request->kategori;
        $data['berita'] = M_Berita::with('kategori')->where('status','Aktif')
        ->when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%'.$judul.'%');
        })
        ->when($kategori, function ($query, $kategori) {
            return $query->whereRelation('kategori','slug', 'like', '%'.$kategori.'%');
        })
        ->orderBy('id','desc')->paginate(12);
        $data['kategoriberita'] = M_KategoriBerita::get();
        
        return view('Blog.MainBerita',$data);
    }

    public function berita_detail($slug)
    {
        $data['berita'] = M_Berita::with('kategori')->where('slug',$slug)->first();
        if ($data['berita']->status == "Tidak Aktif") {
            return redirect()->back()->with('msg','message');
        }
        $data['allberita'] = M_Berita::paginate(12);
        $data['kategoriberita'] = M_KategoriBerita::get();
        return view('Blog.detail_berita',$data);
    }

        public function destinasi(Request $request)
    {
        $judul = $request->judul;
        $kategori = $request->kategori;
        $data['destinasi'] = M_Destinasi::with('kategori')->where('status','Aktif')
        ->when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%'.$judul.'%');
        })
        ->when($kategori, function ($query, $kategori) {
            return $query->whereRelation('kategori','slug', 'like', '%'.$kategori.'%');
        })
        ->orderBy('id','desc')->paginate(12);
        $data['kategoridestinasi'] = M_KategoriDestinasi::get();
        return view('Blog.MainDestinasi',$data);
    }

    public function destinasi_detail($slug)
    {
        $data['destinasi'] = M_Destinasi::with('kategori')->where('slug',$slug)->first();
        if ($data['destinasi']->status == "Tidak Aktif") {
            return redirect()->back()->with('msg','message');
        }
        $data['alldestinasi'] = M_Destinasi::paginate(12);
        $data['kategoridestinasi'] = M_KategoriDestinasi::get();
        return view('Blog.detail_destinasi',$data);
    }
}




