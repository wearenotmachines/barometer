<?php namespace Barometer\Controllers;

use Barometer\Scheme;
use Barometer\Status;

class StatusesController extends \BaseController {

	protected $layout = "layouts.Barometer.fragment";

	public function getReportInFragment($selectedStatusID=null) {
		$this->data['selectedStatusID'] = !empty($selectedStatusID) ? $selectedStatusID : null;
		$this->data['schemes'] = Scheme::orderBy("id")->get();

		$this->data['selectedScheme'] = empty($selectedStatusID) ? Scheme::with("statuses")->find($this->data['schemes']->first()->id) : Scheme::find($selectedStatusID);
		$this->data['statuses'] = $this->data['selectedScheme']->statuses;
		return \View::make("Barometer.Statuses.create", $this->data);
	}


}