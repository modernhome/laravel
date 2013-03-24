<?php

class Create_Photo {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('photos', function($table) {
			// auto incremental id (PK)
			$table->increments('id');
			$table->integer('user_id');
			$table->string('photo', 100);
			$table->string('caption', 100);
			$table->boolean('status');
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
		Schema::drop('photos');
	}

}