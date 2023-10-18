<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterVolume;
use App\Models\Filter;
use App\Models\admin\Sacrificialpool;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{
    public function list(){
        $result['filter'] = Filter::join('water_volume', 'filter.watervolume_id', '=', 'water_volume.id')
            ->select('filter.*', 'water_volume.name as water_volume_name') // Select the columns you need from both tables
            ->get();
        return view('admin.filter.list', $result);
    }

    public function manage_filter(Request $request, $id = "")
    {
        if ($id > 0) {
            $Filter = Filter::find($id);
            $result['name'] = $Filter->name;
            $result['price'] = $Filter->price;
            $result['id'] = $Filter->id;
            $result['watervolume_id'] = $Filter->watervolume_id;
        } else {
            $result['watervolume_id'] = '';
            $result['name'] = '';
            $result['price'] = '';
            $result['id'] = '';
        }
        $result['watervolume'] = WaterVolume::get();
        return view('admin.filter.manage_filter', $result);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'watervolume_id' => 'required',
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
            $Filter = Filter::find($id);
            $message = 'Filter updated successfully!';
        } else {
            $Filter = new Filter;
            $message = 'Filter created successfully!';
        }

        $Filter->name = $request->input('name');
        $Filter->price = $request->input('price');
        $Filter->watervolume_id = $request->input('watervolume_id');
        $Filter->save();

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function delete($id)
    {
        $Filter = Filter::findOrFail($id);
        $Filter->delete();
        $message = 'Filter delete successfully!';
           return redirect('admin/filter')->with('delete', $message );
    }
}
