<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('texto', 1000);
            $table->tinyInteger('tipo'); // 1  conceitual 2 argumentativa 3 posicionamento 4 exemplo 5 outro  
            $table->boolean('personalizado')->default(true);
            //$table->boolean('padrao')->default(false);
            $table->integer('conceito_id')->nullable();
            // $table->foreign('conceito_id')->references('id')->on('conceitos')->onDelete('cascade');   TODO            
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
        Schema::dropIfExists('perguntas');
    }
}
