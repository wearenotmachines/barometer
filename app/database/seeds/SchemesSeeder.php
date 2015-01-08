<?php

use Barometer\Scheme;

class SchemesSeeder extends DatabaseSeeder {

	public function run() {

		DB::table("schemes")->delete();

		Scheme::create(["label"=>"Nautical", "creator"=>1]);
		Scheme::create(["label"=>"Celebrity", "creator"=>1]);
		Scheme::create(["label"=>"Vehicles", "creator"=>1]);
		Scheme::create(["label"=>"Food", "creator"=>1]);

	}

}