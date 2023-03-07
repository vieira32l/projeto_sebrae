<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Pedido;

class PedidoController extends Controller
{
    public function index() {
        $produtos = DB::table('produtos')->get();
        return view('dashboard.pedido.index', ['produtos' => $produtos]);
    }

    public function adicionar(Request $request) {
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $msg = '';

            $saldo_anterior = DB::table('pedidos')->get()->last()->saldo;
            $valor_produto = DB::select("select preco from produtos where id = $request->produto_id");
            $saldo_atual = $saldo_anterior - $valor_produto[0]->preco;
            
            $request->merge([
                'saldo' => $saldo_atual,
            ]);
            $regras = [
                'produto_id' => 'exists:produtos,id',
            ];

            $feedback = [
                'produto_id.exists' => 'O Produto selecionado não existe!',
            ];

            $request->validate($regras, $feedback);
            $pedido = new Pedido();
            $pedido->create($request->all());

            $msg = 'Pedido realizado com sucesso!';
        }
        return view('dashboard.pedido.index', ['msg' => $msg]);
    }
}
 