<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterVolume;
use App\Models\Pump;
use App\Models\admin\Sacrificialpool;
use Illuminate\Support\Facades\Validator;

class PumpController extends Controller
{
    public function list(){
        $result['pump'] = Pump::join('water_volume', 'pump.watervolume_id', '=', 'water_volume.id')
            ->select('pump.*', 'water_volume.name as water_volume_name') // Select the columns you need from both tables
            ->get();
        return view('admin.pump.list', $result);
    }

    public function manage_pump(Request $request, $id = "")
    {
        if ($id > 0) {
            $Pump = Pump::find($id);
            $result['name'] = $Pump->name;
            $result['price'] = $Pump->price;
            $result['id'] = $Pump->id;
            $result['watervolume_id'] = $Pump->watervolume_id;
        } else {
            $result['watervolume_id'] = '';
            $result['name'] = '';
            $result['price'] = '';
            $result['id'] = '';
        }
        $result['watervolume'] = WaterVolume::get();
        return view('admin.pump.manage_pump', $result);
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
            $Pump = Pump::find($id);
            $message = 'Pump updated successfully!';
        } else {
            $Pump = new Pump;
            $message = 'Pump created successfully!';
        }

        $Pump->name = $request->input('name');
        $Pump->price = $request->input('price');
        $Pump->watervolume_id = $request->input('watervolume_id');
        $Pump->save();

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function delete($id)
    {
        $Pump = Pump::findOrFail($id);
        $Pump->delete();
        $message = 'Pump delete successfully!';
           return redirect('admin/pump')->with('delete', $message );
    }
}
