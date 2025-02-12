<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //
    public function index()
    {
        $books = books::all();

        return response()->json([
            'status' => 200,
            'message' => 'Books retrieved successfully.',
            'data' => $books
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'sometimes|required|string',
            'writer'   => 'sometimes|required|string',
            'user_id'  => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'publisher' => 'sometimes|required|string',
            'year'     => 'sometimes|required|integer',
        ]);

        $books = books::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Books created successfully.',
            'data' => $books
        ], 201);
    }

    public function show($id)
    {
        $books = books::find($id);

        if (!$books) {
            return response()->json([
                'status' => 404,
                'message' => 'Books not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Books retrieved successfully.',
            'data' => $books
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $books = books::find($id);

        if (!$books) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        $request->validate([
            'title'    => 'sometimes|required|string',
            'writer'   => 'sometimes|required|string',
            'user_id'  => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'publisher' => 'sometimes|required|string',
            'year'     => 'sometimes|required|integer',
        ]);

        $books->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Books updated successfully.',
            'data' => $books
        ], 200);
    }

    public function destroy($id)
    {
        $books = books::find($id);

        if (!$books) {
            return response()->json([
                'status' => 404,
                'message' => 'Books not found.',
            ], 404);
        }

        $books->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Books deleted successfully.',
        ], 200);
    }
}
