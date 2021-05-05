<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

/// SEARCH
Route::get('/search-your-home', 'SearchController@mainpage')->name('search.mainpage');
Route::post('/search-your-home', 'SearchController@vuefilters');

Route::get('activate/{id}/{token}', 'AuthController@activation')->name('activation');
Route::get('/blog/{slug}', 'HomeController@show')->name('blog.show');
Route::get('/builder/{slug}', 'HomeController@buildershow')->name('builder.buildershow');
Route::get('/banki/{slug}', 'HomeController@bankshow')->name('banki.bankshow');
Route::get('/kvartirishow/{slug}', 'HomeController@kvartirishow')->name('kvartiri.kvartirishow');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::post('/subscribe', 'SubsController@subscribe');
Route::get('/verify/{token}', 'SubsController@verify');

Route::get('/blog', 'HomeController@blog');
Route::get('/builder', 'HomeController@builder');
Route::get('/kvartiri', 'HomeController@kvartiri');
Route::get('/ipoteka', 'HomeController@ipoteka');
Route::get('/banki', 'HomeController@banki');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::post('send-mail', 'MailSettings@send_form');
Route::get('/geoplugin_activation.html', function(){
	return 'ZrDdoqRfZkptljODpr0rbZ42xhtHBn';
});
Route::group(['middleware'	=>	'auth'], function(){
	Route::get('/changepassword', 'ProfileController@changepassword');
	Route::post('/changepassword', 'ProfileController@changepasswordstore');
	Route::get('/profile', 'ProfileController@index')->middleware('verified');
	Route::post('/profile', 'ProfileController@store');
	Route::get('/logout', 'AuthController@logout');
	Route::post('/comment', 'CommentsController@store');
	Route::post('/review', 'ReviewsController@store');
	Route::post('/review_bank', 'ReviewsBankController@store');
});

Route::group(['middleware'	=>	'guest'], function(){
	Route::get('/register', 'AuthController@registerForm');
	Route::post('/register', 'AuthController@register');
	Route::get('/login','AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');
	// Route::get('/reset','AuthController@reset')->name('reset.pass');
	// Route::post('/reset', 'AuthController@reset');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'	=>	'admin'], function(){
	Route::get('/', 'DashboardController@index');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/users', 'UsersController');
	Route::resource('/posts', 'PostsController');
	Route::get('/comments', 'CommentsController@index');
	Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
	Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::get('/reviews', 'ReviewsController@index');
    Route::get('/reviews_banks', 'ReviewsBankController@index');
    Route::get('/reviews/toggle/{id}', 'ReviewsController@toggle');
    Route::get('/reviews_banks/toggle/{id}', 'ReviewsBankController@toggle');
    Route::delete('/reviews/{id}/destroy', 'ReviewsController@destroy')->name('reviews.destroy');
    Route::delete('/reviews_banks/{id}/destroy', 'ReviewsBankController@destroy')->name('reviews_banks.destroy');
	Route::resource('/subscribers', 'SubscribersController');

	Route::resource('/apartments_categories', 'ApartmentsCategotiesController');
	Route::resource('/apartments_hometype', 'ApartmentsHometypeController');
	Route::resource('/apartments_finishs', 'ApartmentsFinishsController');
	Route::resource('/apartments_zhk', 'ApartmentsZhkController');
	Route::resource('/apartments_ocenka', 'ApartmentsOcenkaController');
	Route::resource('/apartments', 'ApartmentsController');
	Route::resource('/banks', 'BanksController');
	Route::resource('/builders', 'BuildersController');
	Route::resource('/builders_type', 'BuildersTypeController');
	Route::resource('/builders_accreditation', 'BuildersAccreditationController');
	Route::resource('/cities', 'CitiesController');
	Route::resource('/quarters', 'QuarterController');
	Route::resource('/ipoteka', 'IpotekaController');

	Route::get('/maps','MapsController@index')->name('maps.index');
	Route::get('/maps/create', 'MapsController@create')->name('maps.create');
	Route::post('/maps-stote', 'MapsController@store')->name('maps.store');
	Route::get('/maps-edit-{map}', 'MapsController@edit')->name('maps.edit');
	Route::patch('/maps-update-{map}', 'MapsController@update')->name('maps.update');
	Route::delete('/maps-{map}-destroy', 'MapsController@destroy')->name('maps.destroy');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'	=>	'admin'], function(){
	Route::resource('/builders', 'BuildersController');
	Route::resource('/builders_type', 'BuildersTypeController');
	Route::resource('/builders_accreditation', 'BuildersAccreditationController');
});	