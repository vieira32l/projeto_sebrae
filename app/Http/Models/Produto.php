<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['categoria_id', 'estabelecimento_id', 'nome', 'preco'];

    public function estabelecimento() {
        return $this->belongsTo('App\Http\Models\Estabelecimento');
    }

    public function categoria() {
        return $this->belongsTo('App\Http\Models\Categoria');
    }

}
