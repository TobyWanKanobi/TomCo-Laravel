<?php namespace TomCo\Services;

use TomCo\models\Account;
use TomCo\models\Customer;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Illuminate\Support\Facades\DB;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:account',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
	
		$account = new Account([
			'email' => $data['email'],
			'wachtwoord' => bcrypt($data['password']),
			]);
			
		$customer = new Customer([
			'voornaam' => $data['firstname'],
			'tussenvoegsel' => $data['insertion'],
			'achternaam' => $data['lastname'],
			'straatnaam' => $data['street'],
			'huisnummer' => $data['number'],
			'toevoeging' => $data['addition'],
			'postcode' => $data['postalcode'],
			'woonplaats' => $data['city']
		]);
		
		DB::transaction(function() use ($account, $customer)
		{
		
			$account->save();
			Account::find($account->getKey())->customer()->save($customer);
			
		
		});
		
		
		return $account;
	}

}
