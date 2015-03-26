<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';
	public $timestamps = false;
	
	public $fillable = ['naam', 'omschrijving', 'prijs', 'categorie', 'afbeelding_naam'];

}