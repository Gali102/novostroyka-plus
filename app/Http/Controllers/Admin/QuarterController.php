<?php

namespace App\Http\Controllers\Admin;

use App\Quarter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    public function index()
    {
        $quarters = Quarter::all();

        return view('admin.quarters.index', ['quarters' =>  $quarters]);
    }

    public function create()
    {
        return view('admin.quarters.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        Quarter::create($request->all());
        return redirect()->route('quarters.index');
    }

    public function edit($id)
    {
        $quarter = Quarter::find($id);
        return view('admin.quarters.edit', ['quarter'=>$quarter]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $quarter = Quarter::find($id);

        $quarter->update($request->all());

        return redirect()->route('quarters.index');
    }

    public function destroy($id)
    {
        Quarter::find($id)->delete();
        return redirect()->route('quarters.index');
    }

}
