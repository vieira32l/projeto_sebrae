<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{   
    protected $table = 'estabelecimentos';
    protected $fillable = ['nome', 'descricao', 'cep', 'rua', 'bairro', 'cidade', 'estado', 'ibge', 'categoria_id'];

    public function categoria() {
        return $this->belongsTo('App\Http\Models\Categoria');
    }
}
