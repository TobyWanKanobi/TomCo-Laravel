<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\CategorieFormRequest;
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
		$cats = Categorie::all();
		//$cats = Categorie::wherenull('parent_id')->with('subCategorien')->get();
		
		return view('admin.categorie.categorie-overzicht', ['categorien' => $cats]);
	}
	
	public function getCreate()
	{
		$categorie = new Categorie();
		
		return view('admin.categorie.create', ['categorie' => $categorie]);
	}
	
	public function toevoegen(CategorieFormRequest $request)
	{
		$categorie = Categorie::create($request->all());
		
		return redirect()->route('categorie_beheer');
	}
	
	public function verwijderen($id)
	{
		Categorie::find($id)->delete();
		
		return redirect()->route('categorie_beheer');
	}
	
	public function getEdit($id)
	{
		$cats = Categorie::find($id);
		
		return view('admin.categorie.edit', ['categorie' => $cats]);
	}
	
	public function wijzigen(CategorieFormRequest $request)
	{
		$categorie = Categorie::find($request->input('categorie_id'));
		
		$categorie->naam = $request->input('naam');
		$categorie->parent_id = $request->input('parent_id');
		//$categorie->prijs = $request->input('prijs');
		//$categorie->omschrijving_kort = $request->input('omschrijving_kort');
		//$categorie->omschrijving_lang = $request->input('omschrijving_lang');
		//$product->afbeelding_klein = $request->input('afbeelding_klein');
		//$product->afbeelding_groot = $request->input('afbeelding_groot');
		
		$categorie->save();
		
		return redirect()->route('categorie_beheer');
	}

}