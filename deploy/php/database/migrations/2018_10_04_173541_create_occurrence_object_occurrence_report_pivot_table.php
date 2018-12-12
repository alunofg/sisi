<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOccurrenceObjectsTable.
 */
class CreateOccurrenceObjectOccurrenceReportPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurrence_object_occurrence_report', function (Blueprint $table) {
            $table->integer('object_id')->unsigned()->index();
            $table->foreign('object_id')->references('id')->on('occurrence_objects')->onDelete('cascade');
            $table->integer('report_id')->unsigned()->index();
            $table->foreign('report_id')->references('id')->on('occurrence_reports')->onDelete('cascade');
            $table->primary(['object_id', 'report_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('occurrence_object_occurrence_report');
    }
}
