<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
//        $categories = Category::all(['name']);
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'request' => 'Web Training course',
            'categories' => $categories
        ]);
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id|integer',
        ]);

        $category = Category::find($request->get('id'));
        return response()->json([
            'status' => true,
            'category' => $category
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:5|max:30',
           
        ]);
        $category = new Category();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->image = "";
        
        $isSaved = $category->save();
        if ($isSaved) {
            return response()->json([
                'status' => true,
                'message' => 'Category Created Successfully',
                'category' => $category
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Category Creation Failed'
            ]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id|integer',
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:5|max:30',
            
        ]);

        $category = Category::find($request->get('id'));
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->image = "";
        $isSaved = $category->save();
        if ($isSaved) {
            return response()->json([
                'status' => true,
                'message' => 'Category Updated Successfully',
                'category' => $category
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Category update Failed'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id|integer',
        ]);

        $isDeleted = Category::destroy($request->get('id'));
        if ($isDeleted) {
            return response()->json([
                'status' => true,
                'message' => 'Category deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Category delete Failed'
            ]);
        }
    }
}