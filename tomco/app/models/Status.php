<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

	protected $table = 'status';
	public $timestamps = false;
	protected $primaryKey = 'type';
	
	public function bestelling()
	{
		return $this->belongsToMany('BestellingTest');
	}
}
