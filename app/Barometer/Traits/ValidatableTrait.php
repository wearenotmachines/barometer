<?php namespace Barometer\Traits;

trait ValidatableTrait {

	private $valid = false;
	private $validationErrors;
	private $failedRules;

	public function isValid() {
		return $this->validate($this->attributes);
	}

	public function validate(Array $against) {
		$validator = \Validator::make($against, $this->rules);
		if ($validator->fails()) {
			$this->validationErrors = $validator->messages();
			$this->failedRules = $validator->failed();
			$this->valid = false;
		} else {
			$this->valid = true;
		}
		return $this->valid;
	}

	public function getValidationErrors() {
		return $this->validationErrors;
	}

	public function getFailedRules() {
		return $this->failedRules;
	}

}