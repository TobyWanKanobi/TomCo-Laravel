<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;
//use TomCo\models\Klant;

class Bestelling extends Model {

	protected $table = 'bestelling';
	public $timestamps = false;
	protected $primaryKey = 'bestelling_id';
	
	//public $fillable = ['product_id', 'aantal', 'subtotaal'];
	
	public function klant()
	{
		return $this->hasOne('TomCo\models\Klant', 'klant_id', 'klant_id');
	}
	
	public function producten()
	{
		return $this->belongsToMany('TomCo\models\Product', 'bestelregel')->withPivot('aantal', 'subtotaal');
	}
}
