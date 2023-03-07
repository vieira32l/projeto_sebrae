<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Produto;

class ProdutoController extends Controller
{
    public function index() {
        $categorias = DB::table('categorias')->get();
        $estabelecimentos = DB::table('estabelecimentos')->get();
        return view('dashboard.produto.index', ['categorias' => $categorias, 'estabelecimentos' => $estabelecimentos]);
    }

    public function adicionar(Request $request) {

        if ($request->input('_token') != '' && $request->input('id') == '') {

            $msg = '';
            $preco = preg_replace("/[^0-9]/", "", $request->preco);
            $request->merge([
                'preco' => $preco,
            ]);
            $regras = [
                'nome' => 'required|min:3|max:100',
                'preco' => 'required|integer',
                'estabelecimento_id' => 'exists:estabelecimentos,id',
                'categoria_id' => 'exists:categorias,id'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido!',
                'nome.min' => 'O campo Nome da Categoria deve ter no mínimo 3 caracteres!',
                'nome.max' => 'O campo Nome da Categoria deve ter no máximo 100 caracteres!',
                'preco.integer' => 'O campo Preço deve ser de valor numérico!',
                'estabelecimento_id.exists' => 'O estabelecimento informado não existe',
                'categoria_id.exists' => 'A categoria informada não existe'
            ];

            $request->validate($regras, $feedback);
            $produto = new Produto();
            $produto->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        return view('dashboard.produto.index', ['msg' => $msg]);
    }

    public function listar() {

    }
}
