<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('author')->nullable();
			$table->string('media')->nullable();
			$table->string('script')->nullable();
			$table->string('content')->nullable();
			$table->string('description')->nullable();
			$table->string('media_class');
			$table->string('category');

			$table->timestamps();
		});
	}

	Schema::table('chants', function($table)
		{
		    $table->string('chanter');
		});

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chants');
	}

}
