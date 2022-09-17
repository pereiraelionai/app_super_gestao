<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    protected $fillable = ['motivo_contato'];
    protected $table = 'motivo_contato';
}
