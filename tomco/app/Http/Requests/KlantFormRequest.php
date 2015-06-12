<?php namespace TomCo\Http\Requests;

use TomCo\Http\Requests\Request;

class KlantFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'voornaam' => 'required',
			'tussenvoegsel' => '',
			'achternaam' => 'required',
			'adres_straat' => 'required',
			'adres_nummer' => 'required',
			'adres_toevoeging' => '',
			'postcode' => 'required',
			'woonplaats' => 'required'
		];
	}

}
