<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //ajustando o nome da tabela (ajuda no erro do tinker)
    use SoftDeletes;
    
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos() {
        return $this->hasMany('App\Item', 'fornecedor_id', 'id'); //1º parametro (tabela), 2º param (FK), 3 param(PK)
    }
}
