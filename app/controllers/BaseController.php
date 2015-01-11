<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
class BaseController extends Controller {

	protected $data = [];
	protected $title = "Barometer";
	protected $bodyClasses = [];

	public function __construct() {
		$this->data['title'] =& $this->title;
		$this->data['bodyClasses'] =& $this->bodyClasses;
		View::share("data", $this->data);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout, $this->data)->nest("authArea", "layouts.Barometer.Elements.authArea", $this->data)->nest("scripts", "Barometer.Elements.scripts");
		}
	}

}
