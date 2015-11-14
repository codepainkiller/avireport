<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('controls', function(Blueprint $table)
		{
			$table->increments('id');

            $table->json('json_control')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->integer('week');
            $table->integer('galpon_id')->unsigned();

            $table->foreign('galpon_id')->references('id')->on('galpons')->onDelete('cascade');

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
		Schema::drop('controls');
	}

}
