<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index()
    {
        $reviews = reviews::all();

        return response()->json([
            'status' => 200,
            'message' => 'Reviews retrieved successfully.',
            'data' => $reviews
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'books_id'    => 'required|integer',
            'user_id'    => 'required|integer',
            'rating'     => 'required|integer', 
            'comment'    => 'required|string',
        ]);

        $review = reviews::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Review created successfully.',
            'data' => $review
        ], 201);
    }

    public function show($id)
    {
        $review = reviews::find($id);

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Review retrieved successfully.',
            'data' => $review
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $review = reviews::find($id);

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        $request->validate([
            'books_id'    => 'required|integer',
            'user_id'    => 'required|integer',
            'rating'     => 'required|integer|min:1|max:5', 
            'comment'    => 'required|string|max:500',
        ]);

        $review->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Review updated successfully.',
            'data' => $review
        ], 200);
    }

    public function destroy($id)
    {
        $review = reviews::find($id);

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        $review->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Review deleted successfully.',
        ], 200);
    }
}
