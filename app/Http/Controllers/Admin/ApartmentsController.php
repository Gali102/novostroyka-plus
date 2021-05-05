<?php

namespace App\Http\Controllers\Admin;

use App\Citi;
use App\Apartment;
use App\ApartmentCategoty;
use App\ApartmentsFinish;
use App\ApartmentsZhk;
use App\ApartmentsOcenka;
use App\ApartmentsHometype;
use App\Quarter;
use App\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', ['apartments'=>$apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cities = Citi::pluck('title', 'id')->all();
        $Builders = Builder::pluck('title', 'id')->all();
        $ApartmentCategories = ApartmentCategoty::pluck('title', 'id')->all();
        $ApartmentsFinishs = ApartmentsFinish::pluck('title', 'id')->all();
        $ApartmentsZhks = ApartmentsZhk::pluck('title', 'id')->all();
        $ApartmentsOcenkas = ApartmentsOcenka::pluck('title', 'id')->all();
        $ApartmentsHometypes = ApartmentsHometype::pluck('title', 'id')->all();
        $Quarters = Quarter::pluck('title', 'id')->all();

        return view('admin.apartments.create', compact(
            'Cities',
            'Builders',
            'ApartmentCategories',
            'ApartmentsFinishs',
            'ApartmentsZhks',
            'ApartmentsOcenkas',
            'ApartmentsHometypes',
            'Quarters'
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
            'image' =>  'nullable|image',
            'image2' =>  'nullable|image',
            'image3' =>  'nullable|image',
            'image4' =>  'nullable|image',
            'image5' =>  'nullable|image',
            'image6' =>  'nullable|image',
            'image7' =>  'nullable|image',
            'image8' =>  'nullable|image'
        ]);

        $apartment = Apartment::add($request->all());
        $apartment->uploadImage($request->file('image'));
        if($request->file('image2')){
            $file = $request->file('image2');
            $file->move(base_path('/public/images/uploads'), $file->getClientOriginalName());
            $data['image2'] = $file->getClientOriginalName();
            $apartment->image2 = $data['image2'];
        }
        if($request->file('image3')){
            $file2 = $request->file('image3');
            $file2->move(base_path('/public/images/uploads'), $file2->getClientOriginalName());
            $data['image3'] = $file2->getClientOriginalName();
            $apartment->image3 = $data['image3'];
        }
        if($request->file('image4')){
            $file3 = $request->file('image4');
            $file3->move(base_path('/public/images/uploads'), $file3->getClientOriginalName());
            $data['image4'] = $file3->getClientOriginalName();
            $apartment->image4 = $data['image4'];
        }
        if($request->file('image5')){
            $file4 = $request->file('image5');
            $file4->move(base_path('/public/images/uploads'), $file4->getClientOriginalName());
            $data['image5'] = $file4->getClientOriginalName();
            $apartment->image5 = $data['image5'];
        }
        if($request->file('image6')){
            $file5 = $request->file('image6');
            $file5->move(base_path('/public/images/uploads'), $file5->getClientOriginalName());
            $data['image6'] = $file5->getClientOriginalName();
            $apartment->image6 = $data['image6'];
        }
        if($request->file('image7')){
            $file6 = $request->file('image7');
            $file6->move(base_path('/public/images/uploads'), $file6->getClientOriginalName());
            $data['image7'] = $file6->getClientOriginalName();
            $apartment->image7 = $data['image7'];
        }
        if($request->file('image8')){
            $file7 = $request->file('image8');
            $file7->move(base_path('/public/images/uploads'), $file7->getClientOriginalName());
            $data['image8'] = $file7->getClientOriginalName();
            $apartment->image8 = $data['image8'];
        }
        $apartment->setCiti($request->get('citi_id'));
        $apartment->setBuilder($request->get('builder_id'));
        $apartment->setApartmentCategoty($request->get('apartmentcategoty_id'));
        $apartment->setApartmentsFinish($request->get('apartmentsfinish_id'));
        $apartment->setApartmentsZhk($request->get('apartmentszhk_id'));
        $apartment->setApartmentsOcenka($request->get('apartmentsocenka_id'));
        $apartment->setApartmentsHometype($request->get('apartmentshometype_id'));
        $apartment->setQuarter($request->get('quarter_id'));
        $apartment->toggleStatus($request->get('status'));
        $apartment->toggleFeatured($request->get('is_featured'));
        $apartment->save();

        return redirect()->route('apartments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);
        $cities = Citi::pluck('title', 'id')->all();
        $builders = Builder::pluck('title', 'id')->all();
        $apartmentcategories = ApartmentCategoty::pluck('title', 'id')->all();
        $apartmentsfinishs = ApartmentsFinish::pluck('title', 'id')->all();
        $apartmentszhks = ApartmentsZhk::pluck('title', 'id')->all();
        $apartmentsocenkas = ApartmentsOcenka::pluck('title', 'id')->all();
        $apartmentshometypes = ApartmentsHometype::pluck('title', 'id')->all();
        $quarters = Quarter::pluck('title', 'id')->all();
        

        return view('admin.apartments.edit', compact(
            'apartment',
            'cities',
            'builders',
            'apartmentcategories',
            'apartmentsfinishs',
            'apartmentszhks',
            'apartmentsocenkas',
            'apartmentshometypes',
            'quarters'
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
            'image' =>  'nullable|image',
            'image2' =>  'nullable|image',
            'image3' =>  'nullable|image',
            'image4' =>  'nullable|image',
            'image5' =>  'nullable|image',
            'image6' =>  'nullable|image',
            'image7' =>  'nullable|image',
            'image8' =>  'nullable|image'
        ]);

        $apartment = Apartment::find($id);
        $apartment->edit($request->all());
        $apartment->uploadImage($request->file('image'));
        if($request->file('image2')){
            $file = $request->file('image2');
            $file->move(base_path('/public/images/uploads'), $file->getClientOriginalName());
            $data['image2'] = $file->getClientOriginalName();
            $apartment->image2 = $data['image2'];
        }
        if($request->file('image3')){
            $file2 = $request->file('image3');
            $file2->move(base_path('/public/images/uploads'), $file2->getClientOriginalName());
            $data['image3'] = $file2->getClientOriginalName();
            $apartment->image3 = $data['image3'];
        }
        if($request->file('image4')){
            $file3 = $request->file('image4');
            $file3->move(base_path('/public/images/uploads'), $file3->getClientOriginalName());
            $data['image4'] = $file3->getClientOriginalName();
            $apartment->image4 = $data['image4'];
        }
        if($request->file('image5')){
            $file4 = $request->file('image5');
            $file4->move(base_path('/public/images/uploads'), $file4->getClientOriginalName());
            $data['image5'] = $file4->getClientOriginalName();
            $apartment->image5 = $data['image5'];
        }
        if($request->file('image6')){
            $file5 = $request->file('image6');
            $file5->move(base_path('/public/images/uploads'), $file5->getClientOriginalName());
            $data['image6'] = $file5->getClientOriginalName();
            $apartment->image6 = $data['image6'];
        }
        if($request->file('image7')){
            $file6 = $request->file('image7');
            $file6->move(base_path('/public/images/uploads'), $file6->getClientOriginalName());
            $data['image7'] = $file6->getClientOriginalName();
            $apartment->image7 = $data['image7'];
        }
        if($request->file('image8')){
            $file7 = $request->file('image8');
            $file7->move(base_path('/public/images/uploads'), $file7->getClientOriginalName());
            $data['image8'] = $file7->getClientOriginalName();
            $apartment->image8 = $data['image8'];
        }
        $apartment->setCiti($request->get('citi_id'));
        $apartment->setBuilder($request->get('builder_id'));
        $apartment->setApartmentCategoty($request->get('apartmentcategoty_id'));
        $apartment->setApartmentsFinish($request->get('apartmentsfinish_id'));
        $apartment->setApartmentsZhk($request->get('apartmentszhk_id'));
        $apartment->setApartmentsOcenka($request->get('apartmentsocenka_id'));
        $apartment->setApartmentsHometype($request->get('apartmentshometype_id'));
        $apartment->setQuarter($request->get('quarter_id'));
        $apartment->toggleStatus($request->get('status'));
        $apartment->toggleFeatured($request->get('is_featured'));
        $apartment->save();
        return redirect()->route('apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apartment::find($id)->remove();
        return redirect()->route('apartments.index');
    }
}
