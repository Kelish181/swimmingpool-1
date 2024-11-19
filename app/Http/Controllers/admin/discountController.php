<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\discount;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class discountController extends Controller
{
    public function list()
    {
        return view('admin.discount.list');

    }
    public function getDataTable()
    {
        $data = discount::select([
            'id',
            'discount',


        ]);
    
        return Datatables::of($data)
        ->addColumn('actions', function ($row) {
            // Use $row->id to access the current row's ID
            $html = '<a href="' . route('admin.discount.edit', [$row->id]) . '" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit foam">
                        <i class="fa fa-edit"></i>
                    </a>&nbsp;';
            return $html;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
    
    public function manage_discount(Request $request, $id = '')
    {
        // Initialize the result array
        $result = [];
        
        // Check if a valid ID is provided
        if ($id) {
            // Attempt to find the skimmer with the given ID
            $discount =  discount::find($id);
            
            // Check if the skimmer exists
            if ($discount) {
                // Populate the result array with the skimmer's attributes
              
                $result['discount'] = $discount->discount;

                $result['id'] = $id; // Add the ID to the result for form action
            } else {
                // Handle case where the skimmer was not found
                return uredirect()->rote('discount')->with('error', ' discount not found.');
            }
        } else {
            // Set default values if no ID is provided
           
            $result['discount'] = '';

        }
        
        // Return the view with the result data
        return view('admin.discount.manage_discount',$result);
    }
    
    public function manage_process(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
         
            'discount' => 'string',

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
            $discount = discount::find($id);
            if ($discount) {
                $discount->update($request->except('id')); // Update the skimmer with request data excluding 'id'
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'discount not found.' // Handle case if skimmer doesn't exist
                ]);
            }
        } else {
            // Create a new skimmer if no ID is provided (optional)
            discount::create($request->except('id'));
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Process completed successfully!',
            'redirect' => route('admin.discount.list') // Redirect to the list page after success
        ]);
    }
    
    
}