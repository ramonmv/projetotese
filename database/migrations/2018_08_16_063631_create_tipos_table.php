<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc');
            $table->string('nome');        
            $table->boolean('is_acesso')->default(false);                 
            $table->boolean('is_autoria')->default(false); 
            $table->boolean('is_vote')->default(false);
            $table->boolean('is_nav')->default(false);                
            $table->boolean('is_intervencao')->default(false);
            $table->integer('fase')->default(0); 
            $table->integer('etapa')->unsigned();
            $table->timestamps();
            //  is acesso
            //  is autoria
            //  is intervencao
            //  is nav
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}
