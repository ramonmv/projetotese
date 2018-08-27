<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('texto', 1000);
            //$table->integer('pergunta_id');
            
            $table->integer('conceito_id')->unsigned(); // #mod 
            $table->foreign('conceito_id')->references('id')->on('conceitos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('respostas');

        // Schema::dropIfExists('duvida_resposta');
    }


}
