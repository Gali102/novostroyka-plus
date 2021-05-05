<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Map;
use App\Citi;
use App\Apartment;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::all();
        return view('admin.maps.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Citi::all();
        $apartment = Apartment::all();
        return view('admin.maps.create', compact('apartment','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $map = new map;
        $map->apartment_id = request('apartment_id');
        $map->city = request('city');
        $map->street = request('street');
        $map->house_number = request('house_number');
        if($request->input('flat_number')){
            $map->flat_number = request('flat_number');
        }
        $map->save();
        return redirect()->route('maps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = Citi::all();
        $apartment = Apartment::all();
        $map = Map::findOrFail($id);
        return view('admin.maps.edit', compact('map', 'apartment', 'cities'));
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
        $map = Map::findOrFail($id);
        $map->apartment_id = request('apartment_id');
        $map->city = request('city');
        $map->street = request('street');
        $map->house_number = request('house_number');
        if($request->input('flat_number')){
            $map->flat_number = request('flat_number');
        }
        $map->save();
        return redirect()->route('maps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map = Map::find($id)->delete();
        return redirect()->route('maps.index');
    }
}
