<?php namespace Barometer\Controllers;

use Barometer\Scheme;

class SchemesController extends \BaseController {

	protected $layout = "layouts.Barometer.fragment";

	public function view($id) {
		return \Response::json(Scheme::with("statuses")->find($id)->toArray(), 200);
	}

}