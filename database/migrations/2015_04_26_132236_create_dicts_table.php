<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dicts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('dict_id');
			$table->string('entry');
			$table->string('beijing_entry');
			$table->string('pronunciation');
			$table->string('interpretation')->nullable();
			$table->string('sound');
			$table->string('picture');
			$table->string('category');
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
		Schema::drop('dicts');
	}

}
