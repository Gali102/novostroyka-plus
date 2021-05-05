<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
    	$user = Auth::user();
    	return view('pages.profile', ['user'	=>	$user]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name'	=>	'required',
    		'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
    		'avatar'	=>	'nullable|image'
    	]);

    	$user = Auth::user();
    	$user->edit($request->all());
    	//$user->generatePassword($request->get('password'));
    	$user->uploadAvatar($request->file('avatar'));

    	return redirect()->back()->with('status', 'Профиль успешно обновлен');
    }

    public function changepassword()
    {
        $user = Auth::user();
        return view('pages.changepassword', ['user' => $user]);
    }

    public function changepasswordstore(Request $request)
    {
        $user = Auth::user();
        $user->generatePassword($request->get('password'));

        return redirect()->back()->with('status', 'Пароль успешно обновлен');

        // return view('pages.changepassword'); 
        //return view('pages.profile', ['user'    =>  $user]);
    }
}
