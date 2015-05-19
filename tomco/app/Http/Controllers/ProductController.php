<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\ProductFormRequest;
use TomCo\models\Product;
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
		
		return view('admin.product.create', ['product' => $product]);
	}
	
	public function postCreate(ProductFormRequest $request)
	{
		$product = Product::create($request->all());
		
		return redirect()->route('products');
	}
	
	public function getEdit($id)
	{
		
		$product = Product::find($id);
		
		return view('admin.product.edit', ['product' => $product]);
	}

	public function postEdit(ProductFormRequest $request)
	{
		$product = Product::find($request->input('product_id'));
		
		$product->naam = $request->input('naam');
		$product->prijs = $request->input('prijs');
		$product->omschrijving_kort = $request->input('omschrijving_kort');
		$product->omschrijving_lang = $request->input('omschrijving_lang');
		//$product->afbeelding_klein = $request->input('afbeelding_klein');
		//$product->afbeelding_groot = $request->input('afbeelding_groot');
		
		$product->save();
		
		return redirect()->route('products');
	}
	
	public function postDelete($id)
	{
		
		Product::find($id)->delete();
		
		return redirect()->route('products');
	}

}