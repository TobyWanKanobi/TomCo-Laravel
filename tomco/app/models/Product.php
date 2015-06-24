<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';
	public $timestamps = false;
	protected $primaryKey = 'product_id';
	
	public $fillable = [
		'categorie_id',
		'naam',
		'prijs',
		'omschrijving_kort',
		'omschrijving_lang',
		'afbeelding_klein',
		'afbeelding_groot'];

	public function bestellingen()
	{
		return $this->belongsToMany('TomCo\models\Bestelling', 'bestelregel', 'product_id', 'bestelling_id');
	}
	
	public function categorie()
	{
		return $this->hasOne('TomCo\models\Categorie', 'categorie_id', 'categorie_id');
	}
	
}