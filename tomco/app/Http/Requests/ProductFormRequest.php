<?php namespace TomCo\Http\Requests;

use TomCo\Http\Requests\Request;

class ProductFormRequest extends Request {

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
			'categorie_id' => '',
			'naam' => 'required',
			'prijs' => 'required',
			'omschrijving_kort' => 'required',
			'omschrijving_lang' => 'required',
			'afbeelding_groot' => '',
			'afbeelding_groot' => ''
		];
	}

}
