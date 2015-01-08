<?php namespace Barometer\Traits;

trait CreatedByTrait {

	public function createdBy() {
		return $this->hasOne("Barometer\BarometerUser", "id", "creator");
	}
}