<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Berita;
use App\Models\M_KategoriBerita;
use DataTables;
class C_KategoriBerita extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = M_KategoriBerita::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3 btn_edit" id="btn_edit" data-id="'.$row->id.'" style="color:white">Edit Kategori <i class="typcn typcn-edit btn-icon-append" style="color:white"></i></button>
                    <button type="button" class="btn btn-danger btn-sm btn-icon-text mr-3" id="btn_delete" data-id="'.$row->id.'">Delete Kategori <i class="typcn typcn-delete-outline btn-icon-append" style="color:white"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Admin.kategoriberita');
    }

    public function detail(Request $request)
    {
        if ($request->ajax()) {
            $data = M_KategoriBerita::find($request->id);
            return response()->json(['result' => $data]);
        }
    }

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $data = M_KategoriBerita::get();
            return response()->json(['result' => $data]);
        }
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'nama' => 'required|max:255',
                ],
            );

            $attribute = [
                'nama' => 'Nama Kategori',
            ];
            $validator->setAttributeNames($attribute);

            if (!$validator->passes()) {
                return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
            } else {
                
                M_KategoriBerita::create([
                    'nama' => $request->nama,
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
                    'nama' => 'required|max:255',
                ],
            );

            $attribute = [
                'nama' => 'Nama Kategori',
            ];
            $validator->setAttributeNames($attribute);

            if (!$validator->passes()) {
                return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
            } else {
                $data = M_KategoriBerita::find($request->id);
                $data->update([
                    
                    'nama' => $request->nama,
                ]);
                
                return response()->json(['code' => 1]);
            } 
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $data = M_KategoriBerita::find($request->id);
            $checkbeerita = M_Berita::where('id_kategoriberita','=',$request->id)->get();
            if ($checkbeerita->count() > 0) {
                return response()->json(['code' => 2]);
            } else {
                
                $data->delete();
            }
            return response()->json(['code' => 1]);
        }
    }
}
