<?php namespace TomCo\Http\Controllers\Auth;

use TomCo\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use TomCo\models\Account;
use TomCo\models\Customer;
use TomCo\Http\Requests\LoginFormRequest;
use TomCo\Http\Requests\RegistrationFormRequest;

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

		$this->middleware('guest', ['except' => ['logout', 'register']]);
	}
	
	public function login()
	{
	
		return view('auth.login');
	}
	
	public function poging(LoginFormRequest $request)
	{
		
		$name = $request->input('email');
		$pass = $request->input('wachtwoord');
		
		if (Auth::attempt(['email' => $name, 'password' => $pass])) {
		
			return redirect('/');
			
		} else {

			$errors = new MessageBag();
			$errors->add('wachtwoord', 'Ongeldige inloggegevens');
			return redirect()->back()->withErrors($errors)->withInput(['email' => $name]);
			
		}
		
		return view('auth.login');
	}
	
	public function logout() {
		
		Auth::logout();
		
		return view('home.home');
	}
	
	public function postRegister(RegistrationFormRequest $request) {
		
		//print_r($request);
		$account = new Account([
			'email' => $request->input('email'),
			'wachtwoord' => bcrypt($request->input('password')),
			]);
			
		$customer = new Customer([
			'voornaam' => $request->input('firstname'),
			'tussenvoegsel' => $request->input('insertion'),
			'achternaam' => $request->input('lastname'),
			'straatnaam' => $request->input('street'),
			'huisnummer' => $request->input('number'),
			'huisnummer_toevoeging' => $request->input('addition'),
			'postcode' => $request->input('postalcode'),
			'woonplaats' => $request->input('city')
		]);
		
		// Create transaction if an error occurs neither account or customer will be added to the database
		DB::transaction(function() use ($account, $customer)
		{
			$account->save();
			Account::find($account->getKey())->customer()->save($customer);
		});
		
		// Login to created account
		$this->auth->login($account);

		return redirect($this->redirectPath());
	}

}
