<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLogsTable.
 */
class CreateLogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('action');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('loggable_id')->index();
            $table->string('loggable_type');


            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs');
	}
}
