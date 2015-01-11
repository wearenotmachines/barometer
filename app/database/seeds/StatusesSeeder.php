<?php

use Barometer\Status;
use Barometer\Scheme;

class StatusesSeeder extends DatabaseSeeder {

	public function run() {

		DB::table("statuses")->delete();

		Status::create(["caption"=>"Full steam ahead", "imageURL"=>"/img/nautical/fullsteamahead.jpg", "creator"=>1, "scheme_id"=>Scheme::where("label", "=", "Nautical")->first()->id]);
		Status::create(["caption"=>"Plain Sailing", "creator"=>1, "imageURL"=>"/img/nautical/plainsailing.jpg", "scheme_id"=>Scheme::where("label", "=", "Nautical")->first()->id]);
		Status::create(["caption"=>"Listing slightly", "creator"=>1, "imageURL"=>"/img/nautical/weighinganchor.jpg", "scheme_id"=>Scheme::where("label", "=", "Nautical")->first()->id]);
		Status::create(["caption"=>"Sinking", "creator"=>1, "imageURL"=>"/img/nautical/sinking.jpg", "scheme_id"=>Scheme::where("label", "=", "Nautical")->first()->id]);
		Status::create(["caption"=>"Surrounded by sharks" , "creator"=>1, "imageURL"=>"/img/nautical/surroundedbysharks.jpg", "scheme_id"=>Scheme::where("label", "=", "Nautical")->first()->id]);
	}

}