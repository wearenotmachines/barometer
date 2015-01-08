<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("SET FOREIGN_KEY_CHECKS=0");


		Schema::dropIfExists('users');
		Schema::dropIfExists('teams');
		Schema::dropIfExists('team_user');
		Schema::dropIfExists('schemes');
		Schema::dropIfExists('statuses');
		Schema::dropIfExists('status_user');


		Schema::create("users", function($table) {
			$table->increments("id");
			$table->timestamps();
			$table->softDeletes();
			$table->integer("team_id")->unsigned()->nullable();
			$table->string("forename");
			$table->string("surname");
			$table->string("email")->unique();
			$table->string("password", 60);
			$table->rememberToken();
			$table->foreign("team_id", "fk_user_team_id")->references("id")->on("teams")->onUpdate("CASCADE")->onDelete("CASCADE");
			$table->index(["email", "password"], "i_user_credentials");
			$table->index("forename", "i_user_forename");
			$table->index("surname", "i_user_surname");
		});

		Schema::create("teams", function($table) {
			$table->increments("id");
			$table->timestamps();
			$table->softDeletes();
			$table->string("label");
			$table->string("description")->nullable();
			$table->boolean("active")->default(1);
			$table->integer("creator")->unsigned();
			$table->foreign("creator", "fk_team_creator")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
		});

		Schema::create("team_user", function($table) {
			$table->integer("team_id")->unsigned();
			$table->integer("user_id")->unsigned();
			$table->primary(['team_id', 'user_id']);
			$table->foreign("team_id", "fk_team_user_team")->references("id")->on("teams")->onUpdate("CASCADE")->onDelete("CASCADE");
			$table->foreign("user_id", "fk_team_user_user")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
		});

		Schema::create("schemes", function($table) {
			$table->increments("id");
			$table->timestamps();
			$table->softDeletes();
			$table->string("label");
			$table->string("description")->nullable();
			$table->integer("creator")->unsigned();
			$table->foreign("creator", "fk_scheme_creator")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
			$table->index("label", "i_team_label");
		});

		Schema::create("statuses", function($table) {
			$table->increments("id");
			$table->timestamps();
			$table->softDeletes();
			$table->string("caption");
			$table->string("imageURL");
			$table->integer("scheme_id")->unsigned();
			$table->foreign("scheme_id", "fk_status_scheme")->references("id")->on("schemes")->onUpdate("CASCADE")->onDelete("CASCADE");
		});

		Schema::create("status_user", function($table) {
			$table->integer("user_id")->unsigned();
			$table->integer("status_id")->unsigned();
			$table->dateTime("dated");
			$table->foreign("user_id", "fk_status_user_user")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
			$table->foreign("status_id", "fk_status_user_status")->references("id")->on("statuses")->onUpdate("CASCADE")->onDelete("CASCADE");
			$table->primary(['user_id', 'status_id']);
		});


		DB::statement("SET FOREIGN_KEY_CHECKS=1");

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement("SET FOREIGN_KEY_CHECKS=0");
		
		Schema::drop("users");
		Schema::drop("teams");

		DB::statement("SET FOREIGN_KEY_CHECKS=1");
		
	}

}
