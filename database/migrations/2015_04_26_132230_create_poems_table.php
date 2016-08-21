<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poems', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('content')->nullable();
			$table->string('comment')->nullable();
			$table->string('year')->nullable();
			$table->string('author');
			$table->string('picture')->nullable();
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
		Schema::drop('poems');
	}

}
