<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\KlantFormRequest;
use TomCo\models\Klant;
use Input;
use Redirect;
use Illuminate\View\View;

class KlantController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	public function index()
	{
	
		$klanten = Klant::all();
		
		return view('admin.klant.index', ['klanten' => $klanten]);
	}
	
	public function getEdit($id)
	{
		
		$klant = Klant::find($id);
		
		return view('admin.klant.edit', ['klant' => $klant]);
	}

	public function klantWijzigen(KlantFormRequest $request)
	{
		$klant = Klant::find($request->input('klant_id'));
		
		$klant->voornaam = $request->input('voornaam');
		$klant->tussenvoegsel = $request->input('tussenvoegsel');
		$klant->achternaam = $request->input('achternaam');
		$klant->adres_straat = $request->input('adres_straat');
		$klant->adres_nummer = $request->input('adres_nummer');
		$klant->adres_toevoeging = $request->input('adres_toevoeging');
		$klant->postcode = $request->input('postcode');
		$klant->woonplaats = $request->input('woonplaats');
		$klant->telefoonnummer = $request->input('telefoonnummer');
		$klant->mobielnummer = $request->input('mobielnummer');
		
		$klant->save();
		
		return redirect()->route('klant');
	}
	
	public function klantVerwijderen($id)
	{
		
		Klant::find($id)->delete();
		
		return redirect()->route('klant');
	}

}