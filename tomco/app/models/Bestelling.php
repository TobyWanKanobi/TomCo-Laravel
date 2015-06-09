<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;
use TomCo\models\Product;

class Bestelling extends Model {

	protected $table = 'bestelregel';
	public $timestamps = false;
	protected $primaryKey = 'bestelling_id';
	
	public $fillable = ['product_id', 'aantal', 'subtotaal'];
}
