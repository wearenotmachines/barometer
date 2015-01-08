<?php namespace Barometer;

use Barometer\Traits\ValidatableTrait;

class Status extends \Eloquent {

	protected $table = "statuses";
	protected $fillable = ["caption", "scheme_id"];
	private $validationRules = [
		"caption"=>"required",
		"imageURL"=>"required",
		"scheme_id"=>"required|exists:schemes,id"
	];

	public function scheme() {
		return $this->belongsTo("Barometer\Scheme");
	}

	public function postedBy() {
		return $this->belongsToMany("Barometer\BarometerUser", "status_user", "status_id", "user_id");
	}
}