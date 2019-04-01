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
            $table->string('sobrenome')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('pais')->nullable();
            $table->string('instituicao')->nullable();
            $table->string('empresa')->nullable();
            $table->string('site')->nullable();
            $table->string('cep')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    } 
}
