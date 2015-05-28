<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('food_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->timestamps();

			//Relationship
			$table->foreign('user_id')
						->references('id')
						->on('users')
						->onDelete('cascade');

			$table->foreign('order_id')
						->references('id')
						->on('orders')
						->onDelete('cascade');
						
			$table->foreign('food_id')
						->references('id')
						->on('foods')
						->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detail_orders');
	}

}
