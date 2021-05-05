<?php

namespace App\Http\Controllers\Admin;

use App\ApartmentsOcenka;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentsOcenkaController extends Controller
{
    public function index()
    {
        $apartments_ocenkas = ApartmentsOcenka::all();

        return view('admin.apartments_ocenka.index', ['apartments_ocenkas' =>  $apartments_ocenkas]);
    }

    public function create()
    {
        return view('admin.apartments_ocenka.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        ApartmentsOcenka::create($request->all());
        return redirect()->route('apartments_ocenka.index');
    }

    public function edit($id)
    {
        $apartments_ocenka = ApartmentsOcenka::find($id);
        return view('admin.apartments_ocenka.edit', ['apartments_ocenka'=>$apartments_ocenka]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $apartments_ocenka = ApartmentsOcenka::find($id);

        $apartments_ocenka->update($request->all());

        return redirect()->route('apartments_ocenka.index');
    }

    public function destroy($id)
    {
        ApartmentsOcenka::find($id)->delete();
        return redirect()->route('apartments_ocenka.index');
    }

}
