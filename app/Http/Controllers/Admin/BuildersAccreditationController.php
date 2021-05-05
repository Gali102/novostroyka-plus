<?php

namespace App\Http\Controllers\Admin;

use App\BuildersAccreditation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildersAccreditationController extends Controller
{
    public function index()
    {
        $buildersaccreditations = BuildersAccreditation::all();

        return view('admin.builders_accreditation.index', ['buildersaccreditations' =>  $buildersaccreditations]);
    }

    public function create()
    {
        return view('admin.builders_accreditation.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        BuildersAccreditation::create($request->all());
        return redirect()->route('builders_accreditation.index');
    }

    public function edit($id)
    {
        $buildersaccreditation = BuildersAccreditation::find($id);
        return view('admin.builders_accreditation.edit', ['buildersaccreditation'=>$buildersaccreditation]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $buildersaccreditation = BuildersAccreditation::find($id);

        $buildersaccreditation->update($request->all());

        return redirect()->route('builders_accreditation.index');
    }

    public function destroy($id)
    {
        BuildersAccreditation::find($id)->delete();
        return redirect()->route('builders_accreditation.index');
    }

}
