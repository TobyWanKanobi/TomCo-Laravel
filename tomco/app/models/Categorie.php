<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;
use TomCo\models\Product;

class Categorie extends Model {

	protected $table = 'categorie';
	public $timestamps = false;
	protected $primaryKey = 'categorie_id';
	
	public $fillable = ['naam', 'parent_id'];
	
	public function subCategorien()
	{
		return $this->hasMany('tomco\models\Categorie', 'parent_id');
	}
	
	public function products()
	{
		return $this->hasMany('TomCo\models\Product', 'categorie_id');
	}
}
