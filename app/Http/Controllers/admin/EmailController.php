<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Femail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DataTables;

class EmailController extends Controller
{
    public function list()
    {
        return view('admin.email.list');
    }

    public function getdatatable(Request $request)
    {

        $About = Femail::select('*');
        
        $dataTable = Datatables::of($About)
                    ->addIndexColumn()
                                       
                    ->editColumn('id', function ($data) {
                        static $index = 1;
                        return $index++;
                    })
                    ->rawColumns(['actions']);
     
        
        return $dataTable->make();
    }
    
    public function inquiry(Request $request)
    {
        return view('admin.inquiry');
    }
    
    public function getdata(Request $request)
    {

        $inquiry = DB::table('inquiry');
        
        $dataTable = Datatables::of($inquiry)
                    ->addIndexColumn()
                                       
                    ->editColumn('id', function ($data) {
                        static $index = 1;
                        return $index++;
                    })
                    ->rawColumns(['actions']);
     
        
        return $dataTable->make();
    }

}
