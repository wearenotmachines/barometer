<?php namespace Barometer;

use Barometer\Traits\ValidatableTrait;
use Barometer\Traits\CreatedByTrait;

class Scheme extends \Eloquent {

	use ValidatableTrait, CreatedByTrait;

	protected $table = "schemes";
	protected $fillable = ["label", "description", "creator"];
	private $validationRules = [
		"label"=>"required",
		"creator"=>"required|exists:users,id"
	];

	public function statuses() {
		return $this->hasMany("Barometer\Status");
	}


}