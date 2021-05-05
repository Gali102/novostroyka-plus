<?php

namespace App\Http\Controllers\Admin;

use App\ApartmentCategoty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentsCategotiesController extends Controller
{
    public function index()
    {
        $apartments_categories = ApartmentCategoty::all();

        return view('admin.apartments_categories.index', ['apartments_categories' =>  $apartments_categories]);
    }

    public function create()
    {
        return view('admin.apartments_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        ApartmentCategoty::create($request->all());
        return redirect()->route('apartments_categories.index');
    }

    public function edit($id)
    {
        $apartments_category = ApartmentCategoty::find($id);
        return view('admin.apartments_categories.edit', ['apartments_category'=>$apartments_category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $apartments_category = ApartmentCategoty::find($id);

        $apartments_category->update($request->all());

        return redirect()->route('apartments_categories.index');
    }

    public function destroy($id)
    {
        ApartmentCategoty::find($id)->delete();
        return redirect()->route('apartments_categories.index');
    }

}
