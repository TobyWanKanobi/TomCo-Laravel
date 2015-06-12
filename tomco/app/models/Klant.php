<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model {

	protected $table = 'klant';
	public $timestamps = false;
	protected $primaryKey = 'klant_id';
	
	public $fillable = [
		'voornaam',
		'tussenvoegsel',
		'achternaam',
		'adres_straat',
		'adres_nummer',
		'adres_toevoeging',
		'postcode',
		'woonplaats'];
}
