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
			'categorie_id' => 'required',
			'naam' => 'required',
			'prijs' => 'required',
			'omschrijving_kort' => 'required',
			'omschrijving_kort' => 'max:200',
			'omschrijving_lang' => 'required',
			'omschrijving_lang' => 'max:4294967295',
			'afbeelding_groot' => '',
			'afbeelding_groot' => '',
			'image' => 'required'
		];
	}

}
