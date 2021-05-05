<?php

namespace App\Http\Controllers\Admin;

use App\BuilderType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildersTypeController extends Controller
{
    public function index()
    {
        $buildertypes = BuilderType::all();

        return view('admin.builders_type.index', ['buildertypes' =>  $buildertypes]);
    }

    public function create()
    {
        return view('admin.builders_type.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        BuilderType::create($request->all());
        return redirect()->route('builders_type.index');
    }

    public function edit($id)
    {
        $buildertype = BuilderType::find($id);
        return view('admin.builders_type.edit', ['buildertype'=>$buildertype]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $buildertype = BuilderType::find($id);

        $buildertype->update($request->all());

        return redirect()->route('builders_type.index');
    }

    public function destroy($id)
    {
        BuilderType::find($id)->delete();
        return redirect()->route('builders_type.index');
    }

}
