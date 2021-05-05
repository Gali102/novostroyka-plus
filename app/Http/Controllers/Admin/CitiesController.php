<?php

namespace App\Http\Controllers\Admin;

use App\Citi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Citi::all();

        return view('admin.cities.index', ['cities' =>  $cities]);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        Citi::create($request->all());
        return redirect()->route('cities.index');
    }

    public function edit($id)
    {
        $citi = Citi::find($id);
        return view('admin.cities.edit', ['citi'=>$citi]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $citi = Citi::find($id);

        $citi->update($request->all());

        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        Citi::find($id)->delete();
        return redirect()->route('cities.index');
    }

}
