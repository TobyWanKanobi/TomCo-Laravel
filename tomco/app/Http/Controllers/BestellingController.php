<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\BestellingFormRequest;
use TomCo\models\Product;
use TomCo\models\Bestelling;
use TomCo\models\BestellingTest;
use Input;
use Redirect;

class BestellingController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Bestelling Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}
	
	public function overzicht()
	{
		$products = Product::all();
		$bestellingen = Bestelling::all();
		
		return view('admin.bestelling.bestelling-overzicht', ['bestellingen' => $bestellingen, 'producten' => $products]);
	}
	
	public function verwijderen($id)
	{
		Bestelling::find($id)->delete();
		
		return redirect()->route('bestelling_beheer');
	}
	
	public function getEdit($id)
	{
		$cats = Bestelling::find($id);
		
		return view('admin.bestelling.edit', ['bestelling' => $cats]);
	}
	
	public function wijzigen(BestellingFormRequest $request)
	{
		$bestelling = Bestelling::find($request->input('bestelling_id'));
		$bestellingen = BestellingTest::find($request->input('bestelling_id'));
		
		$bestelling->product_id = $request->input('product_id');
		$bestelling->aantal = $request->input('aantal');
		$bestelling->subtotaal = $request->input('subtotaal');
		$bestellingen->afleveradres_straat = $request->input('afleveradres_straat');
		$bestellingen->afleveradres_nummer = $request->input('afleveradres_nummer');
		$bestellingen->afleveradres_toevoeging = $request->input('afleveradres_toevoeging');
		$bestellingen->afleveradres_postcode = $request->input('afleveradres_postcode');
		$bestellingen->afleveradres_woonplaats = $request->input('afleveradres_woonplaats');
		
		
		$bestelling->save();
		$bestellingen->save();
		
		return redirect()->route('bestelling_beheer');
	}

}