<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateZonesTable.
 */
class CreateZonesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zones', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->string('campus');

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
        Schema::dropIfExists('zones');
	}
}
