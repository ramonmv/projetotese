<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuvidaRespostaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duvida_resposta', function (Blueprint $table) {


            $table->integer('duvida_id')->unsigned()->nullable();
            $table->integer('resposta_id')->unsigned()->nullable();

            $table->primary(['duvida_id','resposta_id']);

            
            $table->foreign('duvida_id')->references('id')->on('duvidas')->onDelete('cascade');
            $table->foreign('resposta_id')->references('id')->on('respostas')->onDelete('cascade');                        
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
        Schema::dropIfExists('duvida_resposta');
    }
}
