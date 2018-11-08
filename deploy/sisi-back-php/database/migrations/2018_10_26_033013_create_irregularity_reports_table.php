<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIrregularityReportsTable.
 */
class CreateIrregularityReportsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('irregularity_reports', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('story');
            $table->string('coordinates');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('agent_id')->index()->nullable();
            $table->foreign('agent_id')->references('id')->on('users');

            $table->unsignedInteger('irregularity_type_id')->index();
            $table->foreign('irregularity_type_id')->references('id')->on('irregularity_types');

            $table->unsignedInteger('zone_id')->index();
            $table->foreign('zone_id')->references('id')->on('zones');

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
		Schema::dropIfExists('irregularity_reports');
	}
}
