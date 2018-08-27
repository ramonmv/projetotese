<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device');
            $table->boolean('desktop');
            $table->string('so');
            $table->string('browser'); //family
            $table->string('posicao');
            $table->string('cidade');
            $table->string('uf');
            $table->string('pais');
            $table->integer('latitude')->unsigned();
            $table->integer('longitude')->unsigned();
            $table->string('detalhes'); //User-Agent \Request::server('HTTP_USER_AGENT');
            
            $table->ipAddress('ip'); 
            $table->boolean('logon')->default(true); //registra se esta logado ou se é visitante

            $table->integer('user_id')->unsigned();
);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
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
        Schema::dropIfExists('acessos');
    }
}
