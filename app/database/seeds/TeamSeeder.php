<?php 
use Barometer\Team;
class TeamSeeder extends DatabaseSeeder {

	public function run() {

		DB::table("teams")->delete();
		DB::statement("ALTER TABLE teams AUTO_INCREMENT=1");

		$t = Team::create([
			"label"=>"Web",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Sales",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Voice & Data",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Service Desk",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Business Operations",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Finance",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Admin",
			"creator"=>1
		])->members()->attach(1);

		$t = Team::create([
			"label"=>"Consultancy",
			"creator"=>1
		])->members()->attach(1);

	}
}