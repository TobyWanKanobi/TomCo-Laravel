<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class BestellingTest extends Model {

	protected $table = 'bestelling';
	public $timestamps = false;
	protected $primaryKey = 'bestelling_id';
	
	public $fillable = ['afleveradres_straat', 'afleveradres_nummer', 'afleveradres_toevoeging', 'afleveradres_postcode', 'afleveradres_woonplaats'];
	
	public function bestelling()
	{
		return $this->belongsToMany('Bestelling');
	}
}
