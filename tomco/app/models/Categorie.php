<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

	protected $table = 'categorie';
	public $timestamps = false;
	protected $primaryKey = 'categorie_id';
	
	public $fillable = ['naam', 'parent_id'];
	
	public function subCategorien()
	{
		return $this->hasMany('TomCo\models\Categorie');
	}
}
