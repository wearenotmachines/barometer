<?php namespace Barometer\Controllers;

use Barometer\BarometerUser;
use \Illuminate\Support\Facades\Response;
use \Illuminate\Support\Facades\Auth;

class AccessController extends \BaseController {

	protected $layout = "layouts/Barometer/access";
	

	public function __construct() {
		$this->data['bodyClasses'][] = "access";
	}

	public function loginUser() {
		$email = \Input::get("email");
		$password = \Input::get("password");
		$output = BarometerUser::login($email, $password);
		return Response::json($output, $output['status'] ? 200 : 500);
	}

	public function logoutUser() {
		Auth::logout();
		return Response::json(["message"=>"You have been logged out"]);
	}

}