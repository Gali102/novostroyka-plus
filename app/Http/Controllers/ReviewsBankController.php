<?php

namespace App\Http\Controllers;

use Auth;
use App\ReviewBank;
use Illuminate\Http\Request;

class ReviewsBankController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'message'	=>	'required'
        ]);

        $reviewbank = new ReviewBank;
        $reviewbank->text = $request->get('message');
        $reviewbank->bank_id = $request->get('bank_id');
        $reviewbank->user_id = Auth::user()->id;
        $reviewbank->save();

        return redirect()->back()->with('status', 'Ваш отзыв будет скоро добавлен!');
    }
}
