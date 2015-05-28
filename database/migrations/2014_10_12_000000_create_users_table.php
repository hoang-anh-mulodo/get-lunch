<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->boolean('isAdmin')->default(false);
			$table->rememberToken();
			$table->timestamps();
		});

		// Insert a default admin user
    DB::table('users')->insert(
        array(
            'name' => 'Admin',
            'email' => 'admin@mulodo.com',
            'password' => bcrypt('admin'),
            'isAdmin' => true
        )
    );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
