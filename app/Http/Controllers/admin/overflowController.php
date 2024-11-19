<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Overflow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class overflowController extends Controller
{
    // Display Skimmer List View
    public function list()
    {
        return view('admin.overflow.list');
    }

    public function getDataTable()
    {
        $data = Overflow::select([
            'id', 
            'excavation1', 
            'leveling_compaction1', 
            'compaction_test1',
            'polyethylene_sheet_1000_gauge1',
            'rubble_soling_230_th1',
            'msrc_pcc_150mm_thick1',
            'modular_panels1',
            'overflow_gutter1',
            'fiber_lining1',
            'paper_glass_tiling_1ft_x_1ft1',
            'granite_coping1',
            'clamps1'
        ]);
    
        return Datatables::of($data)
        ->addColumn('actions', function ($row) {
            // Use $row->id to access the current row's ID
            $html = '<a href="' . route('admin.overflow.edit', [$row->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                        <i class="fa fa-edit"></i>
                    </a>&nbsp;';
            return $html;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
    
    public function manage_overflow(Request $request, $id = '')
    {
        // Initialize the result array
        $result = [];
    
        // Check if a valid ID is provided
        if ($id) {
            // Attempt to find the overflow with the given ID
            $overflow = Overflow::find($id);
    
            // Check if the overflow exists
            if ($overflow) {

                $result['id'] = $id; 
                $result['excavation1'] = $overflow->excavation1;
                $result['leveling_compaction1'] = $overflow->leveling_compaction1;
                $result['compaction_test1'] = $overflow->compaction_test1;
                $result['polyethylene_sheet_1000_gauge1'] = $overflow->polyethylene_sheet_1000_gauge1;
                $result['rubble_soling_230_th1'] = $overflow->rubble_soling_230_th1;
                $result['msrc_pcc_150mm_thick1'] = $overflow->msrc_pcc_150mm_thick1;
                $result['modular_panels1'] = $overflow->modular_panels1;
                $result['overflow_gutter1'] = $overflow->overflow_gutter1;
                $result['fiber_lining1'] = $overflow->fiber_lining1;
                $result['paper_glass_tiling_1ft_x_1ft1'] = $overflow->paper_glass_tiling_1ft_x_1ft1;
                $result['granite_coping1'] = $overflow->granite_coping1;
                $result['clamps1'] = $overflow->clamps1;

            } else {
                // Handle case where the overflow was not found
                return redirect()->route('overflow')->with('error', 'Overflow not found.');
            }
        } else {
            // Set default values if no ID is provided
            $result['excavation1'] = '';
            $result['leveling_compaction1'] = '';
            $result['compaction_test1'] = '';
            $result['polyethylene_sheet_1000_gauge1'] = '';
            $result['rubble_soling_230_th1'] = '';
            $result['msrc_pcc_150mm_thick1'] = '';
            $result['modular_panels1'] = '';
            $result['overflow_gutter1'] = '';
            $result['fiber_lining1'] = '';
            $result['paper_glass_tiling_1ft_x_1ft1'] = '';
            $result['granite_coping1'] = '';
            $result['clamps1'] = '';
        }
    
        // Return the view with the result data
        return view('admin.overflow.manage_overflow', $result);
    }
    public function manage_process(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'excavation1' => 'required',
            'leveling_compaction1' => 'required',
            'compaction_test1' => 'required|string',
            'polyethylene_sheet_1000_gauge1' => 'required',
            'rubble_soling_230_th1' => 'required',
            'msrc_pcc_150mm_thick1' => 'required',
            'modular_panels1' => 'required',
            'overflow_gutter1' => 'required',
            'fiber_lining1' => 'required',
            'paper_glass_tiling_1ft_x_1ft1' => 'required',
            'granite_coping1' => 'required',
            'clamps1' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first() // Return the first validation error
            ]);
        }
    
        // Assuming you have a way to determine if this is an update or create
        $id = $request->input('id');
        
        if ($id) {
            // Update existing Overflow
            $overflow = Overflow::find($id);
            if ($overflow) {
                $overflow->update($request->except('id')); // Update the Overflow with request data excluding 'id'
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'overflow not found.' // Handle case if Overflow doesn't exist
                ]);
            }
        } else {
            // Create a new Overflow if no ID is provided (optional)
            Overflow::create($request->except('id'));
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Process completed successfully!',
            'redirect' => route('overflow')
        ]);
    }
    
    
   
    


}