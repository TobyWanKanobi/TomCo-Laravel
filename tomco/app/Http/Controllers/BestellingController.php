<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\CategorieFormRequest;
use TomCo\models\Product;
use TomCo\models\Bestelling;
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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index($bestelling_id = NULL)
	{
		$bestellingen = Bestelling::wherenull('bestelling_id')->get();
		
		if(isset($bestelling_id)) {
			$bestelling = Bestelling::where('bestelling_id', $bestelling_id)->first(); // Vul één Categorie model op basis van categorienaam
			/*$producten = $categorie->products()->get();*/
		} else {
			$producten = Product::all();
		}
		
		return view('pages.browse-products', ['bestellingen' => $bestellingen, 'producten' => $producten]);
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
		
		$bestelling->product_id = $request->input('product_id');
		$bestelling->aantal = $request->input('aantal');
		$bestelling->subtotaal = $request->input('subtotaal');
		
		$categorie->save();
		
		return redirect()->route('bestelling_beheer');
	}

}