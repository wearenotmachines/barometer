<?php namespace Barometer;

use Barometer\Traits\ValidatableTrait;
use \Illuminate\Support\Facades\Auth;

class BarometerUser extends \User {

use ValidatableTrait;

	protected $table = "users";
	protected $fillable = ["forename", "surname", "email", "password", "created_at", "updated_at"];
	private $rules = [
			"forename"=>"required", 
			"surname"=>"required",
			"email"=>"required|email"
		];

	private static $loginValidationRules = [
		"email"=>"required|exists:users,email|email",
		"password"=>"required"
	];

	public function name() {
		return $this->forename." ".$this->surname;
	}

	public function teams() {
		return $this->belongsToMany("Barometer\Team", "team_user", "user_id");
	}

	public function statuses() {
		return $this->belongsToMany("Barometer\Status", "status_user", "user_id")->withPivot("dated");
	}

	public function setPassword($password) {
		$this->password = \Hash::make($password);
	}

	public function inspect() {
		return $this->attributes;
	}

	public static function login($email, $password) {
		$v = \Validator::make(["email"=>$email, "password"=>$password],self::$loginValidationRules, ["exists"=>"That :attribute address does not exist"]);
		$output = ["status"=>1];
		if ($v->fails()) {
			$output['status'] = 0;
			$output['errors'] = array_map(function($value) {
				if (empty($value)) return;
				return $value;
			}, $v->messages()->all());
		} else {
			if (!Auth::attempt(["email"=>$email, "password"=>$password])) {
				$output['status'] = 0;
				$output['errors'] = "I can't find a user with those credentials";
			} else {
				$output['errors'] = null;
				$output['user'] = Auth::user();
			}
		}
		return $output;
	}

}