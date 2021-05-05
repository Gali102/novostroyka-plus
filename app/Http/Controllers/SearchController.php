<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Citi;
use App\ApartmentsFinish;
use App\ApartmentCategoty;
use App\ApartmentsZhk;
use App\ApartmentsOcenka;
use App\ApartmentsHometype;
use App\Quarter;
use App\Builder;

class SearchController extends Controller
{
    public function mainpage(Request $request){ //ЭТО НЕ VUE, эти данные приходят с главной страницы и страницы квартир (Исправить подключить ко всем фильтровкам vue)
        $cities = Citi::all();
        $quality = ApartmentsFinish::all();
        $apartment_category = ApartmentCategoty::all();
         $home_types = ApartmentsHometype::all();
        $builders = Builder::all();
        $quarter = Quarter::all();
         $apart_type = $request->apart_type;
         $builders_name = $request->builders_name;
         $quarter_time = $request->quarter_time;
         $hometypes_name = $request->hometypes_name;
         $city = $request->city;
         $quality_type = $request->quality_type;
         if($apart_type == ''){
            $apartments = Apartment::with('citi')
            ->with('apartmentcategoty')  // with для того что бы vue видел отношения между моделями
            ->with('apartmentsfinish')
            ->where('apartmentsfinish_id',$quality_type)
            ->where('citi_id',$city)
            ->get();
         }if($quality_type == ''){
            $apartments = Apartment::with('citi')
            ->with('apartmentcategoty')
            ->with('apartmentsfinish')
            ->where('apartmentcategoty_id',$apart_type)
            ->where('citi_id',$city)
            ->get();
         }if($apart_type == '' && $quality_type == '' && $quarter_time == '' && $builders_name == '' && $hometypes_name == ''){
            $apartments = Apartment::with('citi')
            ->with('apartmentcategoty')
            ->with('apartmentsfinish')
            ->where('citi_id','=',$city)
            ->get();
         }if($city != '' && $apart_type != '' && $quality_type != '' && $quarter_time != '' && $builders_name != '' && $hometypes_name != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('quarter_id',$quarter_time)
            ->where('apartmentshometype_id', $hometypes_name)
            ->where('builder_id', $builders_name)
            ->where('apartmentcategoty_id',$apart_type)
            ->where('apartmentsfinish_id',$quality_type)
            ->get();
         }
         return view('search.index', compact('apartments','cities','quality','apartment_category','builders', 'quarter', 'home_types')); response()->json([
            'result' => $apartments // На выхлопе уже json коллекция для vue
         ]);
    }
    public function vuefilters(Request $request){ // Это уже данные для VUE 
       $city = $request->city;
       $apart_type = $request->apart_type;
       $quality_type = $request->quality_type;
       $builders_name = $request->builders_name;
         $quarter_time = $request->quarter_time;
         $hometypes_name = $request->hometypes_name; // хватаем данные из v-model 
         if($apart_type == ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('apartmentsfinish_id',$quality_type)
            ->where('citi_id',$city)
            ->get();
         }if($quality_type == ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('apartmentcategoty_id',$apart_type)
            ->where('citi_id',$city)
            ->get();
         }
         if($apart_type == '' && $quality_type == ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('apartmentsfinish_id',$quality_type)
            ->where('apartmentcategoty_id',$apart_type)
            ->where('citi_id',$city)
            ->get();
         }if($apart_type == '' && $quality_type == '' && $quarter_time == '' && $builders_name == '' && $hometypes_name == ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id','=',$city)->get();
         }if($city != '' && $apart_type != '' && $quality_type != '' && $quarter_time != '' && $builders_name != '' && $hometypes_name != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('quarter_id',$quarter_time)
            ->where('apartmentshometype_id', $hometypes_name)
            ->where('builder_id', $builders_name)
            ->where('apartmentcategoty_id',$apart_type)
            ->where('apartmentsfinish_id',$quality_type)
            ->get();
         }
         if($quarter_time != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('quarter_id',$quarter_time)
            ->get();
         }
         if($builders_name != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('builder_id',$builders_name)
            ->get();
         }
         if($hometypes_name != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('apartmentshometype_id',$hometypes_name)
            ->get();
         }
         if($hometypes_name != '' && $builders_name != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('builder_id',$builders_name)
            ->where('apartmentshometype_id',$hometypes_name)
            ->get();
         }
         if($hometypes_name != '' && $builders_name != '' && $quarter_time != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('builder_id',$builders_name)
            ->where('quarter_id',$quarter_time)
            ->where('apartmentshometype_id',$hometypes_name)
            ->get();
         }
         if($hometypes_name != '' && $builders_name != '' && $quarter_time != '' && $apart_type != ''){
            $apartments = Apartment::with('citi')
            ->with(['apartmentsfinish','apartmentcategoty','builder','quarter','apartmentshometype' ])
            ->where('citi_id',$city)
            ->where('builder_id',$builders_name)
            ->where('apartmentsfinish_id',$quality_type)
            ->where('quarter_id',$quarter_time)
            ->where('apartmentshometype_id',$hometypes_name)
            ->get();
         }
         return response()->json([
            'result' => $apartments // На выхлопе уже json коллекция для vue
         ]);
    }
}
