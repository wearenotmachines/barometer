<?php 

use Barometer\Scheme;
use Barometer\Status;

class WeatherStatusSeeder extends DatabaseSeeder {


	public function run() {

		$s = Scheme::create(["label"=>"Weather", "description"=>"Baby it's cold outside", "creator"=>2]);

		Status::create(["caption"=>"Not a cloud in sight", "scheme_id"=>$s->id, "imageURL"=>"/img/weather/notacloudinsight.jpg"]);
		Status::create(["caption"=>"Sun is shining", "scheme_id"=>$s->id, "imageURL"=>"/img/weather/sunisshining.jpg"]);
		Status::create(["caption"=>"50% chance of precipitation", "scheme_id"=>$s->id, "imageURL"=>"/img/weather/heavyweather.jpg"]);
		Status::create(["caption"=>"Every cloud.......", "scheme_id"=>$s->id, "imageURL"=>"/img/weather/everycloud.jpg"]);
		Status::create(["caption"=>"Raining cats and dogs", "scheme_id"=>$s->id, "imageURL"=>"/img/weather/rainingcatsanddogs.jpg"]);

	}


}