<?php namespace TomCo\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use TomCo\models\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MoreInfoController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| More Info Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
	
	public function getMoreInformation($id)
	{
		$producten = Product::find($id);
		
		return view('pages.moreinformation', ['producten' => $producten]);
	}
	
}
