<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAttachmentsTable.
 */
class CreateAttachmentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachments', function(Blueprint $table) {

            $table->increments('id');
            $table->string('url')->unique();

            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('attachable_id');
            $table->string('attachable_type');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['attachable_id', 'created_at', 'deleted_at']);
		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('attachments');
	}
}
