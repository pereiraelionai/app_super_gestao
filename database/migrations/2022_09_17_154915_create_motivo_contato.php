<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\MotivoContato;

class CreateMotivoContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_contato', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato', 20);
            $table->timestamps();
        });

        /*
        //poderia criar aqui mais não é o ideal, vamos usar um seeder
        MotivoContato::create(['motivo_contato' =>'Dúvida']);
        MotivoContato::create(['motivo_contato' =>'Elogio']);
        MotivoContato::create(['motivo_contato' =>'Reclamação']);
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_contato');
    }
}

