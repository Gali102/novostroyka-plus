<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        return view('admin.reviews.index', ['reviews'	=>	$reviews]);
    }

    public function toggle($id)
    {
        $review = Review::find($id);
        $review->toggleStatus();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Review::find($id)->remove();
        return redirect()->back();
    }
}
