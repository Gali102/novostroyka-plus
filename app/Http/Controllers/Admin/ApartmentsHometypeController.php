<?php

namespace App\Http\Controllers\Admin;

use App\ApartmentsHometype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentsHometypeController extends Controller
{
    public function index()
    {
        $apartments_hometypes = ApartmentsHometype::all();

        return view('admin.apartments_hometype.index', ['apartments_hometypes' =>  $apartments_hometypes]);
    }

    public function create()
    {
        return view('admin.apartments_hometype.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        ApartmentsHometype::create($request->all());
        return redirect()->route('apartments_hometype.index');
    }

    public function edit($id)
    {
        $apartments_zhk = ApartmentsHometype::find($id);
        return view('admin.apartments_hometype.edit', ['apartments_hometype'=>$apartments_hometype]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $apartments_zhk = ApartmentsHometype::find($id);

        $apartments_zhk->update($request->all());

        return redirect()->route('apartments_hometype.index');
    }

    public function destroy($id)
    {
        ApartmentsHometype::find($id)->delete();
        return redirect()->route('apartments_hometype.index');
    }

}
