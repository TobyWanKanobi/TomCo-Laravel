<?php namespace TomCo\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Account extends Model implements AuthenticatableContract {

	use Authenticatable;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'account';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'wachtwoord'];
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
		
	protected $primaryKey = 'account_id';
		
	public $timestamps = false;
	
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
	
	public function customer() {
		return $this->hasOne('TomCo\models\Customer', 'fk_account_id');
	}
	
}
