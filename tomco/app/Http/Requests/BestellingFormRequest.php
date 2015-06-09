<?php namespace TomCo\Http\Requests;

use TomCo\Http\Requests\Request;

class BestellingFormRequest extends Request {

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
			'product_id' => 'required',
			'aantal' => 'required',
			'product_id' => 'required'
		];
	}

}
