<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        //        $categories = Product::all(['name']);
                return response()->json([
                    'status' => true,
                    'message' => 'Success',
                    'request' => 'Web Training course',
                    'categories' => $products
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'price' => 'required|numeric|min:1',
            'image' => 'string',
            'description' => 'required|string|min:10|max:50',
            'discount' => 'required|numeric|max:90',
            'bar_code' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sub_category_id' => 'required|exists:sub_categories,id|integer'
        ]);
        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->description = $request->get('description');
        $product->discount = $request->get('discount');
        $product->bar_code = $request->get('bar_code');
        $product->quantity = $request->get('quantity');
        $product->sub_category_id = $request->get('sub_category_id');
        $product->image = "";
        $isSaved = $product->save();
        if ($isSaved) {
            return response()->json([
                'status' => true,
                'message' => 'Product Created Successfully',
                'Product' => $product
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Product Creation Failed'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request->validate([
            'id' => 'required|exists:products,id|integer',
        ]);

        $product = Product::find($request->get('id'));
        return response()->json([
            'status' => true,
            'Product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'name' => 'required|string|min:3|max:20',
            'price' => 'required|numeric|min:1',
            'image' => 'string',
            'description' => 'required|string|min:10|max:50',
            'discount' => 'required|numeric|max:90',
            'bar_code' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sub_category_id' => 'required|exists:sub_categories,id|integer'
        ]);

        $product = Product::find($request->get('id'));
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->description = $request->get('description');
        $product->discount = $request->get('discount');
        $product->bar_code = $request->get('bar_code');
        $product->quantity = $request->get('quantity');
        $product->sub_category_id = $request->get('sub_category_id');
        $product->image = "";

        $isSaved = $product->save();
        if ($isSaved) {
            return response()->json([
                'status' => true,
                'message' => 'Product Updated Successfully',
                'Product' => $product
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Product update Failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request->validate([
            'id' => 'required|exists:products,id|integer',
        ]);

        $isDeleted = Product::destroy($request->get('id'));
        if ($isDeleted) {
            return response()->json([
                'status' => true,
                'message' => 'Product deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Product delete Failed'
            ]);
        }
    }
    
}

