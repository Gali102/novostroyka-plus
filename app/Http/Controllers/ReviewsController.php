<?php

namespace App\Http\Controllers;

use Auth;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'message'	=>	'required'
        ]);

        $review = new Review;
        $review->text = $request->get('message');
        $review->builder_id = $request->get('builder_id');
        $review->user_id = Auth::user()->id;
        $review->save();

        return redirect()->back()->with('status', 'Ваш отзыв будет скоро добавлен!');
    }
}
