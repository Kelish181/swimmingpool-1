<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DataTables;

class ProductController extends Controller
{
    public function list()
    {
        return view('admin.product.list');
    }

    public function getdatatable(Request $request)
    {
        $products = Product::select('*');
        
        return Datatables::of($products)
            ->addIndexColumn()
            ->addColumn('actions', function ($product) {
                $editUrl = route('admin.product.edit', [$product->id]);
                $deleteUrl = route('admin.product.delete', [$product->id]);

                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Product">
                            <i class="fa fa-edit"></i>
                        </a>&nbsp;
                        <a href="' . $deleteUrl . '" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Product" onclick="return confirm(\'Are you sure you want to delete this product?\');">
                            <i class="fa fa-trash"></i>
                        </a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function manage_product(Request $request, $id = "")
    {
        $product = $id > 0 ? Product::find($id) : new Product;
        $data = [
            'id' => $product->id ?? '',
            'name' => $product->name ?? '',
            'description' => $product->description ?? '',
            'price' => $product->price ?? '',
            'image' => $product->image ?? ''
        ];

        return view('admin.product.manage_product', $data);
    }

    public function manage_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $product = $request->post('id') > 0 ? Product::find($request->post('id')) : new Product;

        // Image upload and deletion
        if ($request->hasFile('image')) {
            $oldImage = public_path('admin/assets/media/product/' . $product->image);
            if ($product->id && File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $file = $request->file('image');
            $fileName = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/assets/media/product'), $fileName);

            $product->image = $fileName;
        }

        $product->name = $request->post('name');
        $product->description = $request->post('description');
        $product->price = $request->post('price');
        $product->save();

        $message = $product->wasRecentlyCreated ? "New Product Uploaded!" : "Product Updated!";
        
        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete the image file if it exists
        if ($product->image) {
            $imagePath = public_path('admin/assets/media/product/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        
        $product->delete();

        return redirect('admin/product')->with('delete', 'Product deleted successfully!');
    }

    public function uploader(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file("upload");
            $fileName = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();

            $img = \Image::make($file);
            $filePath = public_path('admin/assets/media/product/' . $fileName);
            $img->save($filePath, 30);

            $url = asset('admin/assets/media/product/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}