<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Builder;
use App\Bank;
use App\Map;
use App\Citi;
use App\Category;
use Illuminate\Support\Facades\Http;
use App\Apartment;
use App\ApartmentsFinish;
use App\ApartmentCategoty;
use Illuminate\Http\Request;
use App\ApartmentsHometype;
use App\Quarter;

class HomeController extends Controller
{
    public function index()
    {
        $all_apart = Apartment::all();
            $count_apart = $all_apart->count();
        $apartments = Apartment::paginate(6);
        // $posts = view()->composer('pages.index', function($view){
        //     $view->with('recentPosts', Post::where('category_id','7')->orderBy('date', 'desc')->take(4)->get());
        // });
        $posts = view()->composer('pages.index', function($view){
            $view->with('recentPosts', Post::orderBy('date', 'desc')->take(4)->get());
        });
        $market_news = Post::where('category_id','8')->latest()->take(3)->get();
        $people_critics = Post::where('category_id','6')->latest()->take(3)->get();
        $cities = Citi::all();
        $quarter = Quarter::all(); 
        $quality = ApartmentsFinish::all();
        $quality_type = ApartmentsFinish::all();
        $apartment_category = ApartmentCategoty::all();
        $home_types = ApartmentsHometype::all();
        $builders = Builder::all();
        return view('pages.index')
        ->with([
         'apartments' => $apartments,
         'posts' => $posts,
         'cities' => $cities,
         'apartment_category' => $apartment_category,
         'quality' => $quality,
         'quality_type' => $quality_type,
         'builders' => $builders,
         'market_news' => $market_news,
         'count_apart' => $count_apart,
         'people_critics' => $people_critics,
         'quarter' => $quarter,
         'hometypes' => $home_types
         ]);
    }

    public function builder()
    {
        $builders = Builder::paginate(6);

        return view('pages.builder')->with('builders', $builders);      
    }

    public function banki()
    {
        $banks = Bank::paginate(6);

        return view('pages.banks')->with('banks', $banks);      
    }

    public function kvartiri()
    {
        $apartments = Apartment::paginate(6);
        $cities = Citi::all();
        $home_types = ApartmentsHometype::all();
        $builders = Builder::all();
        $quarter = Quarter::all();
        $quality = ApartmentsFinish::all();
        $quality_type = ApartmentsFinish::all();
        $apartment_category = ApartmentCategoty::all();
        $posts = view()->composer('pages.kvartiri', function($view){
            $view->with('recentPosts', Post::orderBy('date', 'desc')->take(4)->get());
        });

        return view('pages.kvartiri')->with([
        'apartments' => $apartments,
        'posts' => $posts,
        'cities' => $cities,
         'apartment_category' => $apartment_category,
         'quality_type' => $quality_type,
         'quality' => $quality,
         'quarter' => $quarter,
         'builders' => $builders,
         'hometypes' => $home_types
         ]);
    }

    public function kvartirishow($slug)
    {
        $apartment = Apartment::where('slug', $slug)->firstOrFail();
        $key = 'b81fd473-e35e-430c-bb10-5b8e24495aa4';
        $response = '';
        $map = Map::where('apartment_id', '=', $apartment->id)->first();
            if($map){
                $client = new \GuzzleHttp\Client();
                $request = $client->get('https://geocode-maps.yandex.ru/1.x/?format=json&apikey='.$key.'&geocode='.$map->city.',+'.$map->street.'+улица, +дом+'.$map->house_number.'&results=1&lang=ru_RU');
                $pre_response = $request->getBody();
                $response = json_decode($pre_response, true);
            }
        return view('pages.kvartirishow', compact('apartment', 'response', 'map', 'key'));  

    }

    public function buildershow($slug)
    {
        $builder = Builder::where('slug', $slug)->firstOrFail();
        return view('pages.buildershow', compact('builder'));
    }

    public function bankshow($slug)
    {
        $bank = Bank::where('slug', $slug)->firstOrFail();
        return view('pages.bankshow', compact('bank'));
    }

    public function blog()
    {
        $posts = Post::paginate(6);

        return view('pages.blog')->with('posts', $posts);   
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->paginate(2);

        return view('pages.list', ['posts'  =>  $posts]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->paginate(2);

        return view('pages.list', ['posts'  =>  $posts]);   
    }

    public function contact()
    {
        return view('pages.contact');   
    }

    public function about()
    {
        return view('pages.about');   
    }

}
