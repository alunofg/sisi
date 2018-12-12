<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateInvolvedPeopleTable.
 */
class CreateInvolvedPeopleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('involved_people', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('cpf', 11)->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['MASCULINO','FEMININO','TRANS_MASC','TRANS_FEM', 'NAO_DECLARADO']);
            $table->enum('skin_color', ['BRANCO','PARDO','NEGRO','INDIGENA','AMARELO', 'NAO_DECLARADO']);
            $table->enum('type', ['VITIMA', 'SUSPEITO', 'TESTEMUNHA']);

            $table->unsignedInteger('occurrence_report_id')->index();
            $table->foreign('occurrence_report_id')->references('id')->on('occurrence_reports');

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
		Schema::drop('involved_people');
	}
}
