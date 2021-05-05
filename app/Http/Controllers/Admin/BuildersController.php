<?php

namespace App\Http\Controllers\Admin;

use App\Builder;
use App\Citi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $builders = Builder::all();
        return view('admin.builders.index', ['builders'=>$builders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cities = Citi::pluck('title', 'id')->all();

        return view('admin.builders.create', compact(
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

        $builder = Builder::add($request->all());
        $builder->uploadImage($request->file('image'));
        $builder->setCiti($request->get('citi_id'));
        $builder->toggleStatus($request->get('status'));
        $builder->toggleFeatured($request->get('is_featured'));

        return redirect()->route('builders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $builder = Builder::find($id);
        $cities = Citi::pluck('title', 'id')->all();

        return view('admin.builders.edit', compact(
            'cities',
            'builder'
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

        $builder = Builder::find($id);
        $builder->edit($request->all());
        $builder->uploadImage($request->file('image'));
        $builder->setCiti($request->get('citi_id'));
        $builder->toggleStatus($request->get('status'));
        $builder->toggleFeatured($request->get('is_featured'));

        return redirect()->route('builders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Builder::find($id)->remove();
        return redirect()->route('builders.index');
    }
}
