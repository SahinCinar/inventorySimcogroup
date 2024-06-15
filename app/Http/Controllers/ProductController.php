<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get()->pluck('name', 'id');
        return view('products.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'qty' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            try {
                $imageName = Str::slug($request->nama, '-') . '-' . time() . '.' . $request->image->getClientOriginalExtension();
                $imagePath = public_path('/upload/products/');
                
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }

                $request->image->move($imagePath, $imageName);
                $input['image'] = '/upload/products/' . $imageName;
            } catch (\Exception $e) {
                Log::error('Image upload error: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Failed to upload image. Please try again.'], 500);
            }
        }

        try {
            Product::create($input);
            return response()->json(['success' => true, 'message' => 'Product Created']);
        } catch (\Exception $e) {
            Log::error('Product creation error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to create product. Please try again.'], 500);
        }
    }

    public function edit($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json($product);
}

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'qty' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            try {
                $imageName = Str::slug($request->nama, '-') . '-' . time() . '.' . $request->image->getClientOriginalExtension();
                $imagePath = public_path('/upload/products/');
                
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }

                $request->image->move($imagePath, $imageName);
                $input['image'] = '/upload/products/' . $imageName;
            } catch (\Exception $e) {
                Log::error('Image upload error: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Failed to upload image. Please try again.'], 500);
            }
        } else {
            $input['image'] = $product->image;
        }

        try {
            $product->update($input);
            return response()->json(['success' => true, 'message' => 'Product Updated']);
        } catch (\Exception $e) {
            Log::error('Product update error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update product. Please try again.'], 500);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image != null && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        try {
            $product->delete();
            return response()->json(['success' => true, 'message' => 'Product Deleted']);
        } catch (\Exception $e) {
            Log::error('Product deletion error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to delete product. Please try again.'], 500);
        }
    }

    public function apiProducts()
    {
        $products = Product::with('category')->get();

        return DataTables::of($products)
            ->addColumn('category_name', function ($product) {
                return $product->category->name;
            })
            ->addColumn('show_photo', function ($product) {
                if ($product->image == null) {
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="' . url($product->image) . '" alt="">';
            })
            ->addColumn('action', function ($product) {
                return '<a onclick="editForm(' . $product->id . ')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a onclick="deleteData(' . $product->id . ')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['category_name', 'show_photo', 'action'])
            ->make(true);
    }
}

