<?php

namespace App\Http\Controllers\Admin;

use App\Citi;
use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('admin.banks.index', ['banks'=>$banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cities = Citi::pluck('title', 'id')->all();

        return view('admin.banks.create', compact(
            'Cities'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'date'  =>  'required',
            'image' =>  'nullable|image'
        ]);

        $bank = Bank::add($request->all());
        $bank->uploadImage($request->file('image'));
        $bank->setCiti($request->get('citi_id'));
        $bank->toggleStatus($request->get('status'));
        $bank->toggleFeatured($request->get('is_featured'));

        return redirect()->route('banks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::find($id);
        $cities = Citi::pluck('title', 'id')->all();

        return view('admin.banks.edit', compact(
            'cities',
            'bank'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'date'  =>  'required',
            'image' =>  'nullable|image'
        ]);

        $bank = Bank::find($id);
        $bank->edit($request->all());
        $bank->uploadImage($request->file('image'));
        $bank->setCiti($request->get('citi_id'));
        $bank->toggleStatus($request->get('status'));
        $bank->toggleFeatured($request->get('is_featured'));

        return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::find($id)->remove();
        return redirect()->route('banks.index');
    }
}
