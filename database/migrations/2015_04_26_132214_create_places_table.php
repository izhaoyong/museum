<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('location')->nullable();
			$table->string('region');
			$table->integer('phote_num');
			$table->string('mandarin');
			$table->string('beijing')->nullable();
			$table->string('traditional');
			$table->text('description')->nullable();
			$table->string('explaination')->nullable();
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('places');
	}

}
