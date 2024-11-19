<?php

namespace App\Http\Controllers\admin;


use App\Models\Infinity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class infinityController extends Controller
{
     // Display Skimmer List View
     public function list()
     {
         return view('admin.infinity.list');
     }
 
     public function getDataTable()
     {
         $data = infinity::select([
             'id', 
             'excavation2', 
             'leveling_compaction2', 
             'compaction_test2',
             'polyethylene_sheet_1000_gauge2',
             'rubble_soling_230_th2',
             'msrc_pcc_150mm_thick2',
             'modular_panels2',
             'overflow_gutter2',
             'fiber_lining2',
             'paper_glass_tiling_1ft_x_1ft2',
             'granite_coping2',
             'clamps2'
         ]);
     
         return Datatables::of($data)
         ->addColumn('actions', function ($row) {
             // Use $row->id to access the current row's ID
             $html = '<a href="' . route('admin.infinity.edit', [$row->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                         <i class="fa fa-edit"></i>
                     </a>&nbsp;';
             return $html;
         })
         ->rawColumns(['actions'])
         ->make(true);
     }
     
     public function manage_infinity(Request $request, $id = '')
     {
         // Initialize the result array
         $result = [];
     
         // Check if a valid ID is provided
         if ($id) {
             // Attempt to find the infinity with the given ID
             $infinity = infinity::find($id);
     
             // Check if the infinity exists
             if ($infinity) {
 
                 $result['id'] = $id; 
                 $result['excavation2'] = $infinity->excavation2;
                 $result['leveling_compaction2'] = $infinity->leveling_compaction2;
                 $result['compaction_test2'] = $infinity->compaction_test2;
                 $result['polyethylene_sheet_1000_gauge2'] = $infinity->polyethylene_sheet_1000_gauge2;
                 $result['rubble_soling_230_th2'] = $infinity->rubble_soling_230_th2;
                 $result['msrc_pcc_150mm_thick2'] = $infinity->msrc_pcc_150mm_thick2;
                 $result['modular_panels2'] = $infinity->modular_panels2;
                 $result['overflow_gutter2'] = $infinity->overflow_gutter2;
                 $result['fiber_lining2'] = $infinity->fiber_lining2;
                 $result['paper_glass_tiling_1ft_x_1ft2'] = $infinity->paper_glass_tiling_1ft_x_1ft2;
                 $result['granite_coping2'] = $infinity->granite_coping2;
                 $result['clamps2'] = $infinity->clamps2;
 
             } else {
                 // Handle case where the infinity was not found
                 return redirect()->route('infinity')->with('error', 'infinity not found.');
             }
         } else {
             // Set default values if no ID is provided
             $result['excavation2'] = '';
             $result['leveling_compaction2'] = '';
             $result['compaction_test2'] = '';
             $result['polyethylene_sheet_1000_gauge2'] = '';
             $result['rubble_soling_230_th2'] = '';
             $result['msrc_pcc_150mm_thick2'] = '';
             $result['modular_panels2'] = '';
             $result['overflow_gutter2'] = '';
             $result['fiber_lining2'] = '';
             $result['paper_glass_tiling_1ft_x_1ft2'] = '';
             $result['granite_coping2'] = '';
             $result['clamps2'] = '';
         }
     
         // Return the view with the result data
         return view('admin.infinity.manage_infinity', $result);
     }
     public function manage_process(Request $request)
     {
         // Validate the incoming request data
         $validator = Validator::make($request->all(), [
             'excavation2' => 'required',
             'leveling_compaction2' => 'required',
             'compaction_test2' => 'required|string',
             'polyethylene_sheet_1000_gauge2' => 'required',
             'rubble_soling_230_th2' => 'required',
             'msrc_pcc_150mm_thick2' => 'required',
             'modular_panels2' => 'required',
             'overflow_gutter2' => 'required',
             'fiber_lining2' => 'required',
             'paper_glass_tiling_1ft_x_1ft2' => 'required',
             'granite_coping2' => 'required',
             'clamps2' => 'required',
         ]);
     
         if ($validator->fails()) {
             return response()->json([
                 'success' => false,
                 'message' => $validator->errors()->first() 
             ]);
         }
     
         // Assuming you have a way to determine if this is an update or create
         $id = $request->input('id');
         
         if ($id) {
             // Update existing Overflow
             $infinity = infinity::find($id);
             if ($infinity) {
                 $infinity->update($request->except('id')); // Update the Overflow with request data excluding 'id'
             } else {
                 return response()->json([
                     'success' => false,
                     'message' => 'infinity not found.' // Handle case if Overflow doesn't exist
                 ]);
             }
         } else {
             // Create a new Overflow if no ID is provided (optional)
             Overflow::create($request->except('id'));
         }
     
         return response()->json([
             'success' => true,
             'message' => 'Process completed successfully!',
             'redirect' => route('infinity')
         ]);
     }
     
     
    
     
 
}