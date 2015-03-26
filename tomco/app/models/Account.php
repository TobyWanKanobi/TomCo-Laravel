<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Account extends Model implements AuthenticatableContract {

	use Authenticatable;
	
	protected $primaryKey = 'account_id';
	protected $table = 'account';
	public $timestamps = false;
	public $fillable = ['email', 'wachtwoord'];
	
	public function getAuthIdentifier() {
		return $this->account_id;
	}
	
	public function getAuthPassword() {
		return $this->wachtwoord;
	}
	
	public function getRememberToken() {
		return null; // not supported
	}
	
	public function setRememberToken($value) {
		// not supported
	}
	
	public function getRememberTokenName() {
		return null; // not supported
	}
	
	/**
	* Overrides the method to ignore the remember token.
	*/
	public function setAttribute($key, $value) {
		
		$isRememberTokenAttribute = $key == $this->getRememberTokenName();
		if (!$isRememberTokenAttribute) {
			parent::setAttribute($key, $value);
		}
	}
	
}
