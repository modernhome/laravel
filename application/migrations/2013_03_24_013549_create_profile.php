<?php

class Create_Profile {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table) {
			// auto incremental id (PK)
			$table->increments('id');
			$table->integer('user_id');
			$table->string('first_name', 25);
			$table->string('last_name', 25);
			$table->string('profile_picture', 100);
			$table->string('address', 255);
			$table->text('info');
			$table->string('number', 20);
			$table->string('city', 255);
			$table->string('zip', 20);
			$table->string('state', 20);
			$table->string('country', 255);
			$table->string('telephone', 100);
			$table->string('phone', 100);
			// created_at | updated_at DATETIME
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}