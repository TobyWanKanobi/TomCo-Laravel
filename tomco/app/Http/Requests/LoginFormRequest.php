<?php namespace TomCo\Http\Requests;

use TomCo\Http\Requests\Request;

class LoginFormRequest extends Request {

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
			'email' => 'required',
			'wachtwoord' => 'required',
		];
	}
	
	public function messages()
	{
    return [
        'email.required' => 'Vul een geldig e-mailadres in',
        'wachtwoord.required' => 'Vul het wachtwoord in',
    ];
}

}
