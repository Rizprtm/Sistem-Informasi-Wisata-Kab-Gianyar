<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\M_Berita;

class C_Berita extends Controller
{
    
        public function index(Request $request)
        {
            if ($request->ajax()) {
                $data = M_Berita::with('kategori')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3 btn_edit" id="btn_edit" data-id="'.$row->id.'" style="color:white">Edit Berita <i class="typcn typcn-edit btn-icon-append" style="color:white"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-icon-text mr-3" id="btn_delete" data-id="'.$row->id.'">Delete Berita <i class="typcn typcn-delete-outline btn-icon-append" style="color:white"></i></button';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('Admin.berita');
        }
        public function formberita(Request $request)
        {
            if ($request->ajax()) {
                $data = M_Berita::with('kategori')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3 btn_edit" id="btn_edit" data-id="'.$row->id.'" style="color:white">Edit Berita <i class="typcn typcn-edit btn-icon-append" style="color:white"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-icon-text mr-3" id="btn_delete" data-id="'.$row->id.'">Delete Berita <i class="typcn typcn-delete-outline btn-icon-append" style="color:white"></i></button';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('Admin.input-news');
        }
        public function detail(Request $request)
        {
            if ($request->ajax()) {
                $data = M_Berita::with('kategori')->find($request->id);
                return response()->json(['result' => $data]);
            }
        }
    
        public function store(Request $request)
        {
            if ($request->ajax()) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'kategori' => 'required|max:255',
                        'judul' => 'required|max:255',
                        'foto' => 'required|mimes:jpg,jpeg|max:2048',
                        'deskripsi' => 'required',
                        'status' => 'required|max:20',
                    ],
                );
    
                $attribute = [
                    'kategori' => 'Kategori',
                    'judul' => 'Judul berita',
                    'foto' => 'Foto',
                    'deskripsi' => 'Deskripsi',
                    'status' => 'Status'
                ];
                $validator->setAttributeNames($attribute);
    
                if (!$validator->passes()) {
                    return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
                } else {
                    if($request->hasFile('foto')){
                        $file = $request->file('foto');
                        $extension = $file->getClientOriginalExtension();
                        $foto = time().'.'.$extension;
                        $file->move('assets/images/berita', $foto);
                    }
                    M_Berita::create([
                        'id_kategoriberita' => $request->kategori,
                        'judul' => $request->judul,
                        'deskripsi' => $request->deskripsi,
                        'foto' => $foto,
                        'status' => $request->status,
                    ]);
                    return response()->json(['code' => 1]);
                } 
            }
        }
    
        public function update(Request $request)
        {
            if ($request->ajax()) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'kategori' => 'required|max:255',
                        'judul' => 'required|max:255',
                        'foto' => 'mimes:jpg,jpeg|max:2048',
                        'deskripsi' => 'required',
                        'status' => 'required|max:20',
                    ],
                );
    
                $attribute = [
                    'kategori' => 'kategori',
                    'judul' => 'Judul berita',
                    'foto' => 'Foto',
                    'deskripsi' => 'Deskripsi',
                    'status' => 'Status'
                ];
                $validator->setAttributeNames($attribute);
    
                if (!$validator->passes()) {
                    return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
                } else {
                    $data = M_Berita ::find($request->id);
                    if($request->hasFile('foto')){
                        $file = $request->file('foto');
                        $extension = $file->getClientOriginalExtension();
                        $foto = time().'.'.$extension;
                        $file->move('assets/images/berita', $foto);
    
                        @unlink('assets/images/berita/'. $data->foto);
    
                        $data->update([
                            'id_kategoriberita' => $request->kategori,
                            'judul' => $request->judul,
                            'deskripsi' => $request->deskripsi,
                            'foto' => $foto,
                            'status' => $request->status,
                        ]);
                    } else {
                        $data->update([
                            'id_kategoriberita' => $request->kategori,
                            'judul' => $request->judul,
                            'deskripsi' => $request->deskripsi,
                            'status' => $request->status,
                        ]);
                    }
                    return response()->json(['code' => 1]);
                } 
            }
        }
    
        public function delete(Request $request)
        {
            if ($request->ajax()) {
                $data = M_Berita::find($request->id);
                @unlink('assets/images/berita/'.$data->foto);
                $data->delete();
                return response()->json(['code' => 1]);
            }
        }
    }

