<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Sacrificialpool;


class SacrificialpoolController extends Controller
{
    //User
    public function list(){
        $result['sacrificial'] = Sacrificialpool::all();
        return view('admin.sacrificialpool.list', $result);
    }

    public function manage_sacrificial(Request $request, $id = "")
    {
        if ($id > 0) {
            $result['sacrificial'] = Sacrificialpool::find($id);
        } else {
            $result['sacrificial'] = '';
        }
    
        return view('admin.sacrificialpool.manage_sacrificialpool', $result);
    }

    public function delete($id)
    {
        $sacrificial = Sacrificialpool::findOrFail($id);
        $sacrificial->delete();
        $message = 'Sacrificial delete successfully!';
           return redirect('admin/sacrificialpool')->with('delete', $message );
    }

    public function store(Request $request)
{

    // return $request->all();
    $validator = Validator::make($request->all(), [
        'modelname' => 'required',
        'includes' => 'required',
        'price' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()->first(),
        ]);
    }

    $id = $request->input('id');

    if ($id > 0) {
        $sacrificial = Sacrificialpool::find($id);
        $message = 'Sacrificial updated successfully!';
    } else {
        $sacrificial = new Sacrificialpool;
        $message = 'Sacrificial created successfully!';
    }

    $sacrificial->modelname = $request->input('modelname');
    $sacrificial->includes = $request->input('includes');
    $sacrificial->price = $request->input('price');
    $sacrificial->save();

    return response()->json([
        'success' => true,
        'message' => $message,
    ]);
}
}
