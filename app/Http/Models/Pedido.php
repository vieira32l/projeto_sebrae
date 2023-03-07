<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['produto_id', 'saldo'];

    public function produto() {
        return $this->belongsTo('App\Http\Models\Produto');
    }
}
