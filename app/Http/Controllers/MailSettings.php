<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Builder;
use App\Category;
use App\Apartment;
use App\MailClass;
use Illuminate\Http\Request;

class MailSettings extends Controller
{

    public function send_form(Request $request)
    {
    	$name = $request -> name;
    	$email = $request -> email;
    	$message = $request -> message;

    	Mail::to('vakhitov797@gmail.com')->send(new MailClass($name, $email));


        return view('pages.about');   
    }

}
