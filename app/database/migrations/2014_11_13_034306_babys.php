<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Babys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

        Schema::create('babys', function($table)
        {
            $table->increments('id');
            $table->char('name', 16);
            $table->date('birth_date');
            $table->string('birth_place')->nullable();
            $table->string('sign')->nullable();
            $table->integer('like');
            $table->integer('flow');
            $table->integer('user_id');
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
		//
        Schema::drop('babys');
	}

}
