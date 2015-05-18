<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	protected $table = 'klant';
	public $timestamps = false;
	protected $primaryKey = 'klant_id';
	
	public $fillable = [
		'voornaam',
		'tussenvoegsel',
		'achternaam',
		'straatnaam',
		'huisnummer',
		'postcode',
		'woonplaats',
		'huisnummer_toevoeging'];
	
	public function account() {
		return $this->hasOne('TomCo\models\Account');
	}

}
