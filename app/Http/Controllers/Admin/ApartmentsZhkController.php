<?php

namespace App\Http\Controllers\Admin;

use App\ApartmentsZhk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentsZhkController extends Controller
{
    public function index()
    {
        $apartments_zhks = ApartmentsZhk::all();

        return view('admin.apartments_zhk.index', ['apartments_zhks' =>  $apartments_zhks]);
    }

    public function create()
    {
        return view('admin.apartments_zhk.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        ApartmentsZhk::create($request->all());
        return redirect()->route('apartments_zhk.index');
    }

    public function edit($id)
    {
        $apartments_zhk = ApartmentsZhk::find($id);
        return view('admin.apartments_zhk.edit', ['apartments_zhk'=>$apartments_zhk]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $apartments_zhk = ApartmentsZhk::find($id);

        $apartments_zhk->update($request->all());

        return redirect()->route('apartments_zhk.index');
    }

    public function destroy($id)
    {
        ApartmentsZhk::find($id)->delete();
        return redirect()->route('apartments_zhk.index');
    }

}
