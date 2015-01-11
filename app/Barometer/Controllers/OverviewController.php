<?php namespace Barometer\Controllers;

class OverviewController extends \BaseController {

	protected $layout = "layouts.Barometer.overview";

	public function __construct() {
		parent::__construct();
		$this->bodyClasses[] = "overview";
	}

	public function overview() {
		$this->title = "How's everyone doing?";
		$this->layout->content = \View::make("Barometer.Overview.overview", $this->data);
	}

}