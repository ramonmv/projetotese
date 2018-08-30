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

            $table->string('deviceFamily')->nullable();
            $table->string('deviceModel')->nullable();
            $table->boolean('isDesktop')->default(true);

            $table->string('so')->nullable();
            $table->string('plataforma')->nullable();

            $table->string('browser')->nullable(); //family
            $table->string('browserVersion')->nullable(); //family
            $table->boolean('isChrome')->default(true); //family
            
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('pais')->nullable();

            $table->string('detalhes')->nullable(); //User-Agent \Request::server('HTTP_USER_AGENT');
            $table->ipAddress('ip')->nullable(); 
            $table->boolean('logon')->default(true); //registra se esta logado ou se é visitante

            $table->integer('user_id')->unsigned();
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
