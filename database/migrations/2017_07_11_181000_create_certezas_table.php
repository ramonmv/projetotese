<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certezas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('texto', 1000);           
            //$table->integer('pergunta_id');
            //$table->integer('conceito_id');           
            $table->boolean('validado')->default(false); //certeza validada
            $table->boolean('deletado')->default(false);
            //$table->integer('questionado'); //certeza questionada
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('doc_id')->unsigned();
            $table->foreign('doc_id')->references('id')->on('docs')->onDelete('cascade');
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
        Schema::dropIfExists('certezas');
    }
}
