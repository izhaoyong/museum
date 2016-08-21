<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('englishes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('picture');
			$table->string('function')->nullable();
			$table->string('category1')->nullable();
			$table->string('category2')->nullable();
			$table->string('recording_date')->nullable();
			$table->string('recorder')->nullable();
			$table->string('commentator')->nullable();
			$table->string('place')->nullabe();
			$table->string('content');
			$table->string('description')->nullable();
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
		Schema::drop('englishes');
	}

}
