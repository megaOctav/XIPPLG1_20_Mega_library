<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = category::all();

        return response()->json([
            'status' => 200,
            'message' => 'Categories retrieved successfully.',
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $category = category::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Category created successfully.',
            'data' => $category
        ], 201);
    }

    public function show($id)
    {
        $category = category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Category not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Category retrieved successfully.',
            'data' => $category
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $category = category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Category not found.',
            ], 404);
        }

        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Category updated successfully.',
            'data' => $category
        ], 200);
    }

    public function destroy($id)
    {
        $category = category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'category not found.',
                'data' => null 
            ],404);
        }

        $category->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Category delete successfully.',
            'data' => $category
    ],200);
    }

}
