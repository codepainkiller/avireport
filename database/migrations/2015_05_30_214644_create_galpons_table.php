<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galpons', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('code');
            $table->integer('number_birds');
            $table->text('description');
            $table->integer('max_capacity')->nullable();
            $table->integer('granja_id')->unsigned();

            $table->foreign('granja_id')->references('id')->on('granjas')->onDelete('cascade');

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
		Schema::drop('galpons');
	}

}
