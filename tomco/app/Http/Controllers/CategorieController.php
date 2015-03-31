<?php namespace TomCo\Http\Controllers;


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
	public function index()
	{
		return view('admin.dashboard');
	}
	
	public function overzicht()
	{
	
		//$cats = Categorie::all();
		$cats = [
				new CategorieTest(1, "Planten", 22),
				new CategorieTest(2, "Meubels", 22),
				new CategorieTest(3, "Vijver", 22),
				new CategorieTest(4, "Zomershit", 22)
			];
		
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