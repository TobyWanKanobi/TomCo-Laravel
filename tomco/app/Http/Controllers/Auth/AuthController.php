<?php namespace TomCo\Http\Controllers\Auth;

use TomCo\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'logout']);
	}
	
	public function login() {
		
		
		return view('auth.login');
	}
	
	public function poging() {
		
		$name = Input::get('email');
		$pass = Input::get('wachtwoord');
		$login = Hash::make('admin');
		
		if (Auth::attempt(['email' => $name, 'password' => $pass])) {
		
			// The user is active, not suspended, and exists.
			
		} else {
			//$login = "fail" . $name . $pass;
		}
		
		return view('auth.login', ['test' => $login]);
	}
	
	public function logout() {
		
		Auth::logout();
		
		return view('pages.home', ['test' => "login"]);
	}

}
