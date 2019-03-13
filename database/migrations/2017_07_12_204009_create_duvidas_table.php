<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuvidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duvidas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('texto', 1000);
            
            //$table->string('origem', 1000); @TODO
            $table->boolean('apropriado')->default(false); 

            //$table->integer('pergunta_id'); ??
            //$table->integer('conceito_id'); ??
            
            $table->boolean('esclarecida')->default(false); //duvida esclarecida
            $table->tinyInteger('prioridade')->default(1);
            $table->boolean('deletado')->default(false);
            
            // auto referencia da duvida apropriada
            $table->integer('duvida_id')->unsigned()->nullable();
            $table->foreign('duvida_id')->references('id')->on('duvidas');


            $table->integer('doc_id')->unsigned();
            $table->foreign('doc_id')->references('id')->on('docs')->onDelete('cascade');
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
        Schema::dropIfExists('duvidas');
    }
}
