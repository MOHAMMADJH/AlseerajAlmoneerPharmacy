<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function  index()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }
public function create(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:3|max:20',
        'description' => 'required|string|min:5|max:30',
        'code' => 'required|integer'
    ]) ;
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
        ]);
    }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Category Creation Failed']);
        }
    }

}


