<?php namespace Barometer;

use Barometer\Traits\ValidatableTrait;
use Barometer\Traits\CreatedByTrait;


class Team extends \Eloquent {

	use ValidatableTrait, CreatedByTrait;

	protected $table = "teams";
	protected $fillable = ["label", "description", "creator"];
	protected $rules = [
		"label"=>"required",
		"creator"=>"required|exists:users,id"
	];

	public function members() {
		return $this->belongsToMany("Barometer\BarometerUser", "team_user", "team_id", "user_id");
	}

}