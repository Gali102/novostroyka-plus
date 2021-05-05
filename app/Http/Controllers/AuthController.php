<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function registerForm()
    {
    	return view('pages.register');
    }

    public function register(Request $request)
    {
    	$this->validate($request, [
    		'name'	=>	'required',
    		'email'	=>	'required|email|unique:users',
			'password'	=>	'required'
    	]);

		$user = User::add($request->all());
    	$user->generatePassword($request->get('password'));

    	return redirect('/login');
	}
	public function activation($userId, $token){
		$user = User::findOrFail($userId);
		if (is_null($user->remember_token)) {
			if (md5($user->email) == $token) {
			$user->status = 1;
			$user->save();
			
			\Session::flash('flash_message', trans('interface.ActivatedSuccess'));
			Auth::login($user, true);
			} else {
			\Session::flash('flash_message_error', trans('interface.ActivatedWrong'));
			}
			} else {
			\Session::flash('flash_message_error', trans('interface.ActivatedAlready'));
			}
			return redirect('/');
	}

    public function loginForm()
    {
    	return view('pages.login');
    }

    public function reset()
    {
        return view('pages.reset');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email'	=>	'required|email',
			'password'	=>	'required'
    	]);

    	if(Auth::attempt([
    		'email'	=>	$request->get('email'),
			'password'	=>	$request->get('password'),
    	], $remember = request('remember'), $last_ip = request('last_ip')))
    	{
			if(Auth::user()->email_verified_at == null){
				return redirect('/profile');
			}else{
				return redirect('/');
			}
    	}

    	return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
