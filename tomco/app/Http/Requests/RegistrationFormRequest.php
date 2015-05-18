<?php namespace TomCo\Http\Requests;

use TomCo\Http\Requests\Request;

class RegistrationFormRequest extends Request {

	public function authorize() {
		
		return true;
		
	}
	
	public function rules()
	{
		return [
			'firstname' => 'required',
			'insertion' => '',
			'lastname' => 'required',
			'street' => 'required',
			'number' => 'required|integer',
			'addition' => '',
			'postalcode' => ['required', 'regex:/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/'],
			'city' => 'required' ,
			'email' => 'required|email|max:255|unique:account',
			'password' => 'required|confirmed|min:6',
		];
	}
	
	public function messages()
	{
		return [
			'required' => ':attribute is een verplicht veld',
			'integer' => 'Ongeldig :attribute',
			'regex' => 'Ongeldige postcode',
			'email' => 'Ongeldig e-mailadres',
			'unique' => 'Er bestaat al een account met dit e-mailadres',
			'max' => ':attribute te lang',
			'confirmed' => 'Wachtwoord komt niet overeen'
			];
	}
	
	public function attributes()
	{
		return [
			'firstname' => 'Voornaam', 
			'insertion' => 'Tussenvoegsel',
			'lastname' => 'Achternaam',
			'street' => 'Straat',
			'number' => 'Huisnummer',
			'addition' => 'Toevoeging',
			'postalcode' => 'Postcode',
			'city' => 'Woonplaats',
			'email' => 'E-mail',
			'password' => 'Wachtwoord'
		];
	}
	
	
}
