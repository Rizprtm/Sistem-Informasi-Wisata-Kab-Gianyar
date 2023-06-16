<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\RegistrasipengajarModel;
use DataTables;

class C_Kecamatan extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RegistrasipengajarModel::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn btn-info btn-sm btn-icon-text mr-3 btn_detail" id="btn_detail" data-id="'.$row->id.'" style="color:white">Lihat Data <i class="typcn typcn-info-large btn-icon-append" style="color:white"></i></button>
                    <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3 btn_edit" id="btn_edit" data-id="'.$row->id.'" style="color:white">Ubah Status <i class="typcn typcn-edit btn-icon-append" style="color:white"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.registrasi.index');
    }

    public function detail(Request $request)
    {
        if ($request->ajax()) {
            $data = RegistrasipengajarModel::find($request->id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
        $validator = \Validator::make(
            $request->all(),
            [
                'status' => 'required'
            ],
        );

        $attribute = [
            'status' => 'Status'
        ];
        $validator->setAttributeNames($attribute);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $data = RegistrasipengajarModel::find($request->id);
            $data->update([
                'status' => $request->status,
            ]);
            return response()->json(['code' => 1]);
        }
        } 
    }
}
