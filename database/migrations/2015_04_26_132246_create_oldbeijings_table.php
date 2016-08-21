<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldbeijingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oldbeijings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('item_id');
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
		Schema::drop('oldbeijings');
	}

}
