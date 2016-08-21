<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('type');
			$table->string('title');
			$table->string('author');
			$table->string('edition')->nullable();
			$table->string('publisher')->nullable();
			$table->string('year')->nullable();
			$table->text('introduction');
			$table->string('note')->nullable();
			$table->string('fengmian');
			$table->string('mulu');
			$table->string('pdf');
			$table->timestamps();
		});
		Schema::table('books', function($table)
		{
		    $table->integer('book_id');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
