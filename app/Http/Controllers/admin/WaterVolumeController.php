<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterVolume;
use App\Models\admin\Sacrificialpool;
use Illuminate\Support\Facades\Validator;
use DataTables;
use DB;


class WaterVolumeController extends Controller
{
    public function list(){
        $result['watervolume'] = WaterVolume::all();
        return view('admin.watervolume.list', $result);
    }

    public function getdatatable(Request $request)
    {
        
       $WaterVolume = DB::table('water_volume')
            ->leftJoin('sacrificialpools', 'water_volume.p_id', '=', 'sacrificialpools.id')
            ->select('water_volume.turnover_time','water_volume.name','water_volume.id', 'sacrificialpools.modelname')
            ->get();
      
        $dataTable = Datatables::of($WaterVolume)
                    ->addIndexColumn()
                    ->addColumn('actions', function ($data) {
                        $html = '<a href="' . route('admin.watervolume.edit', [$data->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                                    <i class="fa fa-edit"></i>
                                </a>&nbsp;
                                <a href="' . route('admin.watervolume.delete', [$data->id]) . '" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Category" onclick="return confirm(\'Are you sure you want to delete this item?\');">
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

    public function manage_watervolume(Request $request, $id = "")
    {
        if ($id > 0) {
            $watervolume = WaterVolume::find($id);
            $result['name'] = $watervolume->name;
            $result['turnover_time'] = $watervolume->turnover_time;
            $result['volume_from'] = $watervolume->volume_from;
            $result['p_id'] = $watervolume->p_id;
            $result['volume_to'] = $watervolume->volume_to;
            $result['id'] = $watervolume->id;
        } else {
            $result['watervolume'] = '';
            $result['turnover_time'] = '';
            $result['name'] = '';
            $result['volume_from'] = '';
            $result['p_id'] = '';
            $result['volume_to'] = '';
            $result['id'] = '';
        }
        $result['pools'] = DB::table('sacrificialpools')->get();
        return view('admin.watervolume.manage_watervolume', $result);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $id = $request->input('id');

        if ($id > 0) {
            $WaterVolume = WaterVolume::find($id);
            $message = 'WaterVolume updated successfully!';
        } else {
            $WaterVolume = new WaterVolume;
            $message = 'WaterVolume created successfully!';
        }

        $WaterVolume->name = $request->input('name');
        $WaterVolume->turnover_time = $request->input('turnover_time');
        $WaterVolume->volume_from = $request->input('volume_from');
        $WaterVolume->p_id = $request->input('p_id');
        $WaterVolume->volume_to = $request->input('volume_to');
        $WaterVolume->save();

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function delete($id)
    {
        $WaterVolume = WaterVolume::findOrFail($id);
        $WaterVolume->delete();
        $message = 'WaterVolume delete successfully!';
           return redirect('admin/watervolume')->with('delete', $message );
    }
    
    
    
    
    //pools
    
    public function pools_list(){
        $result['pools'] = DB::table('pools')->get();
        return view('admin.pools.list', $result);
    }

    public function poolsgetdatatable(Request $request)
    {
        
        $pools = DB::table('pools')->get();
       
         
        
        $dataTable = Datatables::of($pools)
                    ->addIndexColumn()
                    ->addColumn('actions', function ($data) {
                        $html = '<a href="' . route('admin.pools.edit', [$data->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                                    <i class="fa fa-edit"></i>
                                </a>&nbsp;
                                <a href="' . route('admin.pools.delete', [$data->id]) . '" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Category" onclick="return confirm(\'Are you sure you want to delete this item?\');">
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

    public function manage_pools(Request $request, $id = "")
    {
        if ($id > 0) {
            $pools = DB::table('pools')->where('id', $id)->first();
            $result['pool_name'] = $pools->pool_name;
            $result['id'] = $pools->id;
        } else {
            $result['pool_name'] = '';
            $result['id'] = '';
        }
        return view('admin.pools.manage_pools', $result);
    }

    public function pools_store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'pool_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $id = $request->input('id');

        if ($id > 0) {
           DB::table('pools')->where('id', $request->post('id'))->update([
               
               'pool_name' => $request->post('pool_name'),
               
               ]);  
            $message = 'pools updated successfully!';
        } else {
            $sales = DB::table('pools')->insert([
                
                'pool_name' => $request->post('pool_name'),
                
                ]);
            $message = 'pools created successfully!';
        }

        // $WaterVolume->save();

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function pools_delete($id)
    {
        // $WaterVolume = pools::findOrFail($id);
        $pools = DB::table('pools')->where('id', $id)->delete();
        // $pools->delete();
        $message = 'Pool delete successfully!';
           return redirect('admin/pools')->with('delete', $message );
    }
    
    
    
}
