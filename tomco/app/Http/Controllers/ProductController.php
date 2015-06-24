<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\ProductFormRequest;
use TomCo\models\Product;
use TomCo\models\Categorie;
use Input;
use Redirect;
use Illuminate\View\View;

class ProductController extends Controller {

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
	
		$products = Product::all();
		
		return view('admin.product.index', ['products' => $products]);
	}
	
	public function getCreate()
	{
		
		$product = new Product();
		$categorie_opties = Categorie::lists('naam', 'categorie_id');
		
		return view('admin.product.create', ['product' => $product, 'categorie_opties' => $categorie_opties]);
	}
	
	public function postCreate(ProductFormRequest $request)
	{	
		 if (Input::file('image')->isValid()) {
			
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			
			$values = $request->all();
			$values['afbeelding_groot'] = $fileName;
			$values['afbeelding_klein'] = $fileName;
			$product = Product::create($values);
		}
		
		return redirect()->route('products');
	}
	
	public function getEdit($id)
	{
		
		$product = Product::find($id);
		$categorie_opties = Categorie::lists('naam', 'categorie_id');
		
		return view('admin.product.edit', ['product' => $product, 'categorie_opties' => $categorie_opties]);
	}

	public function postEdit(ProductFormRequest $request)
	{
		 if (Input::file('image')->isValid()) {
			
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			
			$product = Product::find($request->input('product_id'));
			$product->naam = $request->input('naam');
			$product->categorie_id = $request->input('categorie_id');
			$product->prijs = $request->input('prijs');
			$product->omschrijving_kort = $request->input('omschrijving_kort');
			$product->omschrijving_lang = $request->input('omschrijving_lang');
			$product->afbeelding_klein = $fileName;
			$product->afbeelding_groot = $fileName;
			
			$product->save();
		}
		
		return redirect()->route('products');
	}
	
	public function postDelete($id)
	{
		
		Product::find($id)->delete();
		
		return redirect()->route('products');
	}

}