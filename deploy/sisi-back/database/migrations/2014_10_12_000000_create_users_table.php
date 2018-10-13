<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('cpf',11)->unique();
            $table->date('birthdate');
            $table->enum('gender', ['MASCULINO','FEMININO','TRANS_MASC','TRANS_FEM', 'NAO_DECLARADO']);
            $table->enum('skin_color', ['BRANCO','PARDO','NEGRO','INDIGENA','AMARELO', 'NAO_DECLARADO']);
            $table->string('cellphone')->unique();
            $table->string('phone')->nulllabel();
            $table->enum('status',['ATIVO','BLOQUEADO','INATIVO']);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->unsignedInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles');


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
        Schema::dropIfExists('users');
    }
}
