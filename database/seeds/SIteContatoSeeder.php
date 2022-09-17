<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SIteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 99999-4999';
        $contato->email = 'contato@email.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem vindo ao sistema Super Gestão';
        $contato->save();
        */

        factory(SiteContato::class, 100)->create();
    }
}
