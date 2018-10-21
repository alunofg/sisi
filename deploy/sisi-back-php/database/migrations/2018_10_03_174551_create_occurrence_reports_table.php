<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOccurrenceReportsTable.
 */
class CreateOccurrenceReportsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('occurrence_reports', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('story');
            $table->date('occurrence_date');
            $table->time('occurrence_time');
            $table->string('coordinates');
            $table->boolean('police_report')->default(false);
            $table->decimal('estimated_loss')->nullable();
            $table->enum('status', ['NOVO', 'EM INVESTIGACAO', 'CONCLUIDO', 'ARQUIVADA'])->default('NOVO');
            $table->boolean('confidential')->default(false);

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('agent_id')->index()->nullable();
            $table->foreign('agent_id')->references('id')->on('users');

            $table->unsignedInteger('occurrence_type_id')->index();
            $table->foreign('occurrence_type_id')->references('id')->on('occurrence_types');

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
		Schema::drop('occurrence_reports');
	}
}
