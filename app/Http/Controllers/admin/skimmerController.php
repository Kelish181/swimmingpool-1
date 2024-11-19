<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skimmer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SkimmerController extends Controller
{
    // Display Skimmer List View
    public function list()
    {
        
        return view('admin.skimmer.list');
    }
   
    public function getDataTable()
    {
        $data = Skimmer::select([
            'id',
            'excavation', 
            'leveling_compaction', 
            'compaction_test',
            'polyethylene_sheet_1000_gauge',
            'rubble_soling_230_th',
            'msrc_pcc_150mm_thick',
            'modular_panels',
            'overflow_gutter',
            'fiber_lining',
            'paper_glass_tiling_1ft_x_1ft',
            'granite_coping',
            'clamps',


        ]);
    
        return Datatables::of($data)
        ->addColumn('actions', function ($row) {
            // Use $row->id to access the current row's ID
            $html = '<a href="' . route('admin.skimmer.edit', [$row->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                        <i class="fa fa-edit"></i>
                    </a>&nbsp;';
            return $html;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
    
    public function manage_skimmer(Request $request, $id = '')
    {
        // Initialize the result array
        $result = [];
        
        // Check if a valid ID is provided
        if ($id) {
            // Attempt to find the skimmer with the given ID
            $skimmer = Skimmer::find($id);
            
            // Check if the skimmer exists
            if ($skimmer) {
                // Populate the result array with the skimmer's attributes
                $result['id'] = $id; 
                $result['excavation'] = $skimmer->excavation;
                $result['leveling_compaction'] = $skimmer->leveling_compaction;
                $result['compaction_test'] = $skimmer->compaction_test;
                $result['polyethylene_sheet_1000_gauge'] = $skimmer->polyethylene_sheet_1000_gauge;
                $result['rubble_soling_230_th'] = $skimmer->rubble_soling_230_th;
                $result['msrc_pcc_150mm_thick'] = $skimmer->msrc_pcc_150mm_thick;
                $result['modular_panels'] = $skimmer->modular_panels;
                $result['overflow_gutter'] = $skimmer->overflow_gutter;
                $result['fiber_lining'] = $skimmer->fiber_lining;
                $result['paper_glass_tiling_1ft_x_1ft'] = $skimmer->paper_glass_tiling_1ft_x_1ft;
                $result['granite_coping'] = $skimmer->granite_coping;
                $result['clamps'] = $skimmer->clamps;
            } else {
                // Handle case where the skimmer was not found
                return redirect()->route('skimmer')->with('error', 'Skimmer not found.');
            }
        } else {
            // Set default values if no ID is provided
            $result['excavation'] = '';
            $result['leveling_compaction'] = '';
            $result['compaction_test'] = '';
            $result['polyethylene_sheet_1000_gauge'] = '';
            $result['rubble_soling_230_th'] = '';
            $result['msrc_pcc_150mm_thick'] = '';
            $result['modular_panels'] = '';
            $result['overflow_gutter'] = '';
            $result['fiber_lining'] = '';
            $result['paper_glass_tiling_1ft_x_1ft'] = '';
            $result['granite_coping'] = '';
            $result['clamps'] = '';

        }
        
        // Return the view with the result data
        return view('admin.skimmer.manage_skimmer', $result);
    }
    
    public function manage_process(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'excavation' => 'required|string',
            'leveling_compaction' => 'required|string',
            'compaction_test' => 'required|string',
            'polyethylene_sheet_1000_gauge' => 'required|string',
            'rubble_soling_230_th' => 'required|string',
            'msrc_pcc_150mm_thick' => 'required|string',
            'modular_panels' => 'required|string',
            'overflow_gutter' => 'required|string',
            'fiber_lining' => 'required|string',
            'paper_glass_tiling_1ft_x_1ft' => 'required|string',
            'granite_coping' => 'required|string',
            'clamps' => 'required|string',

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
            // Update existing skimmer
            $skimmer = Skimmer::find($id);
            if ($skimmer) {
                $skimmer->update($request->except('id')); // Update the skimmer with request data excluding 'id'
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Skimmer not found.' // Handle case if skimmer doesn't exist
                ]);
            }
        } else {
            // Create a new skimmer if no ID is provided (optional)
            Skimmer::create($request->except('id'));
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Process completed successfully!',
            'redirect' => route('skimmer') // Redirect to the list page after success
        ]);
    }
    
    
    
// public function store(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         'excavation' => 'required|numeric|min:0',
//         'leveling_compaction' => 'required|numeric|min:0',
//         'compaction_test' => 'required|numeric|min:0',
//         'polyethylene_sheet_1000_gauge' => 'required|numeric|min:0',
//         'rubble_soling_230_th' => 'required|numeric|min:0',
//         'msrc_pcc_150mm_thick' => 'required|numeric|min:0',
//         'modular_panels' => 'required|numeric|min:0',
//         'overflow_gutter' => 'required|numeric|min:0',
//         'fiber_lining' => 'required|numeric|min:0',
//         'paper_glass_tiling_1ft_x_1ft' => 'required|numeric|min:0',
//         'granite_coping' => 'required|numeric|min:0',
//         'clamps' => 'required|numeric|min:0',
//     ]);

//     // Create or update the skimmer rates
//     $skimmer = Skimmer::updateOrCreate(
//         ['id' => $request->id],
//         $request->only([
//             'excavation',
//             'leveling_compaction',
//             'compaction_test',
//             'polyethylene_sheet_1000_gauge',
//             'rubble_soling_230_th',
//             'msrc_pcc_150mm_thick',
//             'modular_panels',
//             'overflow_gutter',
//             'fiber_lining',
//             'paper_glass_tiling_1ft_x_1ft',
//             'granite_coping',
//             'clamps'
//         ])
//     );

//     // Determine the success message based on whether it was a create or update
//     $message = $request->id ? 'Skimmer rates have been successfully updated.' : 'Skimmer rates have been successfully created.';

//     // Redirect to the list page with a success message
//     return redirect()->route('skimmer')->with('success', $message);
// }


    // public function delete($id)
    // {
    //     $skimmer = Skimmer::findOrFail($id);
    //     $skimmer->delete();
    //     return redirect()->route('skimmer')->with('delete', 'Skimmer has been successfully deleted.');
    // }
}