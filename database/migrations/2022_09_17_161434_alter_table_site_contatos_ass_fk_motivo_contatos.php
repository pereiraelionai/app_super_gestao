<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAssFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //copaindo os dados de motivo_contato para motivo contato_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando FK e remover a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contato');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover FK e criar a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            // o laravel coloca o arquivo da foreign como: <tabela>_<coluna_foreign>_foreign
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });        

        //repopulando os dados de motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        //remover a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
