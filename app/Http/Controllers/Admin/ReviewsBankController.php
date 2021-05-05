<?php

namespace App\Http\Controllers\Admin;

use App\ReviewBank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsBankController extends Controller
{
    public function index()
    {
        $reviewbanks = ReviewBank::all();

        return view('admin.reviews_banks.index', ['reviewbanks'	=>	$reviewbanks]);
    }

    public function toggle($id)
    {
        $reviewbank = ReviewBank::find($id);
        $reviewbank->toggleStatus();

        return redirect()->back();
    }

    public function destroy($id)
    {
        ReviewBank::find($id)->remove();
        return redirect()->back();
    }
}
