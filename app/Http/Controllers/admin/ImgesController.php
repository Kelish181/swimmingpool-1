<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cimage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class ImgesController extends Controller
{
    public function list()
    {
        return view('admin.categoryimage.list');
    }

    public function getdatatable(Request $request)
    {

        $About = Cimage::select('*');
        
        $dataTable = Datatables::of($About)
                    ->addIndexColumn()
                   ->addColumn('actions', function ($data) {
                        $html = '<a href="' . route('admin.categoryimages.edit', [$data->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                                    <i class="fa fa-edit"></i>
                                </a>&nbsp;
                                <a href="' . route('admin.categoryimages.delete', [$data->id]) . '" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Category" onclick="return confirm(\'Are you sure you want to delete this item?\');">
                                    <i class="fa fa-trash"></i>
                                </a>';
                        return $html;
                    })                  
                    ->editColumn('id', function ($data) {
                        static $index = 1;
                        return $index++;
                    })
                    ->rawColumns(['actions']);
     
        
        return $dataTable->make();
        // return response()->json($dataTable, 200);
    }

    //Edit And Add:
    public function manage_about(Request $request, $id = "")
    {
        if ($id > 0) {
            $About = Cimage::find($id);
            $result['name'] = $About->name;
            $result['id'] = $About->id;
        } else {
            $result['name'] = '';
            $result['id'] = '';
        }
        return view('admin.categoryimage.manage_categoryimage', $result);
    }

     public function manage_process(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()->first(),
        ]);
    }

    $message = "";
    $about = ($request->post('id') > 0) ? Cimage::find($request->post('id')) : new Cimage;

    // Function to handle file upload and deletion
        if ($fileInput = $request->hasfile('name')) {

            $file = $request->file($fileInput);
            $name = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $upload_path = 'admin/assets/media/categoryimages';
            $file->move($uploadPath, $name);

            $about->{$fileInput} = $name;
            $about->name = $name;
        }

    $about->save();

    $message = $about->wasRecentlyCreated ? "New About Us Uploaded!" : "About Us Updated!";

    return response()->json([
        'success' => true,
        'message' => $message,
    ]);
}


    //Delete
    public function delete($id)
    {
        $Filter = Cimage::findOrFail($id);
        $Filter->delete();
        $message = 'About Us delete successfully!';
        return redirect('admin/about')->with('delete', $message );
    }
}
