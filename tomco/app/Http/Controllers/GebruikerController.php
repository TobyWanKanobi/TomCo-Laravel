<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\CategorieFormRequest;
use TomCo\models\Bestelling;
use TomCo\models\Customer;
use Input;
use Redirect;

class GebruikerController extends Controller {
	
	public function index($id)
	{
		$customer = Customer::where('account_id', '=', $id)->select('klant_id', 'voornaam')->get();
		$klant = $customer[0]['klant_id'];
		$klantnaam = $customer[0]['voornaam'];
		$bestellingen = Bestelling::where('klant_id', '=', $klant)->get();
		return view('pages.userpage', ['bestellingen' => $bestellingen, 'klantnaam' => $klantnaam]);
	}
	
	public function getOrderCustomer($klant_id, $bestelling_id)
	{
		$order = Bestelling::find($bestelling_id);
		
		return view('pages.gebruiker.details', ['order' => $order]);
	}
	
}
