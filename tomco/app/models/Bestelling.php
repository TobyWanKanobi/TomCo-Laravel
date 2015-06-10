<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model {

	protected $table = 'bestelregel';
	public $timestamps = false;
	protected $primaryKey = 'bestelling_id';
	
	public $fillable = ['product_id', 'aantal', 'subtotaal'];
	
	public function getProduct()
	{
		return Product::where('product_id', $this->product_id)->first()->naam;
	}
	
	public function getStreet()
	{
		return BestellingTest::where('bestelling_id', $this->bestelling_id)->first()->afleveradres_straat;
	}
	
	public function getNumber()
	{
		return BestellingTest::where('bestelling_id', $this->bestelling_id)->first()->afleveradres_nummer;
	}
	
	public function getExtra()
	{
		return BestellingTest::where('bestelling_id', $this->bestelling_id)->first()->afleveradres_toevoeging;
	}
	
	public function getZipCode()
	{
		return BestellingTest::where('bestelling_id', $this->bestelling_id)->first()->afleveradres_postcode;
	}
	
	public function getResidence()
	{
		return BestellingTest::where('bestelling_id', $this->bestelling_id)->first()->afleveradres_woonplaats;
	}
}
