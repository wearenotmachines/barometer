<?php namespace Barometer;

use Barometer\Traits\ValidatableTrait;

class Team extends \Eloquent {

	use ValidatableTrait;

	protected $table = "teams";
	protected $fillable = ["label", "description", "creator"];
	protected $rules = [
		"label"=>"required",
		"creator"=>"required|exists:users,id"
	];

	public function createdBy() {
		return $this->hasOne("Barometer\BarometerUser", "id", "creator");
	}

	public function members() {
		return $this->belongsToMany("Barometer\BarometerUser", "team_user", "team_id", "user_id");
	}

}