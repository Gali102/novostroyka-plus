<?php

namespace App\Http\Controllers\Admin;

use App\ApartmentsFinish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentsFinishsController extends Controller
{
    public function index()
    {
        $apartments_finishs = ApartmentsFinish::all();

        return view('admin.apartments_finishs.index', ['apartments_finishs' =>  $apartments_finishs]);
    }

    public function create()
    {
        return view('admin.apartments_finishs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        ApartmentsFinish::create($request->all());
        return redirect()->route('apartments_finishs.index');
    }

    public function edit($id)
    {
        $apartments_finish = ApartmentsFinish::find($id);
        return view('admin.apartments_finishs.edit', ['apartments_finish'=>$apartments_finish]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $apartments_finish = ApartmentsFinish::find($id);

        $apartments_finish->update($request->all());

        return redirect()->route('apartments_finishs.index');
    }

    public function destroy($id)
    {
        ApartmentsFinish::find($id)->delete();
        return redirect()->route('apartments_finishs.index');
    }

}
