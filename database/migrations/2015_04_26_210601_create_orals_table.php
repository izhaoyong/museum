<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOralsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('picture');
			$table->string('video');
			$table->string('xml');
			$table->string('content')->nullable();
			$table->string('speaker');
			$table->timestamps();
		});
		Schema::table('orals', function($table)
		{
		    $table->text('subtitle');
		    $table->string('subtitle_file');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orals');
	}

}
