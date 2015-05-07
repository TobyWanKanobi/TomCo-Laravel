<?php namespace TomCo\Http\Controllers;

use TomCo\models\Product;
use TomCo\models\CategorieTest;
use TomCo\models\Categorie;
use Input;
use Redirect;

class CategorieController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Categorie Controller
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
	public function index($naam = NULL)
	{
		$categorieen = Categorie::wherenull('parent_id')->with('subCategorien')->get();
		
		if(isset($naam)) {
			$categorie = Categorie::where('naam', $naam)->first(); // Vul één Categorie model op basis van categorienaam
			$producten = $categorie->products()->get();
		} else {
			$producten = Product::all();
		}
		
		return view('pages.browse-products', ['categorieen' => $categorieen, 'producten' => $producten]);
	}
	
	public function overzicht()
	{
	
		return view('admin.categorie-overzicht', ['categorien' => $cats]);
	}
	
	public function toevoegen()
	{
	}
	
	public function verwijderen()
	{
	}
	
	public function verplaatsen()
	{
	}

}