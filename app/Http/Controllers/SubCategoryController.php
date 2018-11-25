<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with(['category', 'products'])->get();
//        $categories = SubCategory::all(['name']);
        return response()->json([
            'status' => true,
            'message' => 'SSuccess',
            'request' => 'Web Training course',
            'categories' => $subCategories
        ]);
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sub_categories,id|integer',
        ]);

        $subCategory = SubCategory::find($request->get('id'));
        return response()->json([
            'status' => true,
            'subCategory' => v
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:5|max:30',
            'category_id' => 'required|exists:categories,id|integer'
        ]);
        $subCategory = new SubCategory();
        $subCategory->name = $request->get('name');
        $subCategory->description = $request->get('description');
        $subCategory->image = "";
        $subCategory->category_id = $request->get('category_id');
        $isSaved = $subCategory->save();
        if ($isSaved) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategory Created Successfully',
                'subCategory' => $subCategory
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategory Creation Failed'
            ]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sub_categories,id|integer',
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:5|max:30',
            'category_id' => 'required|exists:categories,id|integer'
        ]);

        $subCategory = SubCategory::find($request->get('id'));
        $subCategory->name = $request->get('name');
        $subCategory->description = $request->get('description');
        $subCategory->image = "";
        $subCategory->category_id = $request->get('category_id');
        $isSaved = $subCategory->save();
        if ($isSaved) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategory Updated Successfully',
                'subCategory' => $subCategory
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategory update Failed'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sub_categories,id|integer',
        ]);

        $isDeleted = SubCategory::destroy($request->get('id'));
        if ($isDeleted) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategory deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategory delete Failed'
            ]);
        }
    }
}
