<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Estabelecimento;
use App\Http\Models\Categoria;
use Illuminate\Support\Facades\DB;

class EstabelecimentoController extends Controller
{
    public function index() {
        $categorias = DB::table('categorias')->get();
        return view('dashboard.estabelecimento.index', ['categorias' => $categorias]);
    }

    public function adicionar(Request $request) {

        if($request->input('_token') != '' && $request->input('id') == '') {

            $msg = '';

            $regras = [
                'nome' => 'required|min:3|max:100',
                'descricao' => 'required|min:10|max:2000',
                'categoria_id' => 'exists:categorias,id',
                'cep' => 'required|integer',
                'rua' => 'required|min:3|max:255',
                'bairro' => 'required|min:3|max:100',
                'cidade' => 'required|min:3|max:100',
                'estado' => 'required|min:2|max:2',
                'ibge' => 'required|integer',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido!',
                'nome.min' => 'O campo Nome da Categoria deve ter no mínimo 3 caracteres!',
                'nome.max' => 'O campo Nome da Categoria deve ter no máximo 40 caracteres!',
                'descricao.min' => 'O campo Nome da Categoria deve ter no mínimo 10 caracteres!',
                'descricao.max' => 'O campo Nome da Categoria deve ter no máximo 2000 caracteres!',
                'categoria_id.exists' => 'A categoria informada não existe',
                'cep.integer' => 'O campo cep deve ser um número inteiro',
                'rua.min' => 'O campo Rua deve ter no mínimo 3 caracteres!',
                'rua.max' => 'O campo Rua deve ter no máximo 100 caracteres!',
                'bairro.min' => 'O campo Bairro deve ter no mínimo 3 caracteres!',
                'bairro.max' => 'O campo Bairro deve ter no máximo 100 caracteres!',
                'cidade.min' => 'O campo Cidade deve ter no mínimo 3 caracteres!',
                'cidade.max' => 'O campo Cidade deve ter no máximo 100 caracteres!',
                'estado.min' => 'O campo Estado deve ter no mínimo 2 caracteres!',
                'estado.max' => 'O campo Estado deve ter no máximo 2 caracteres!',
                'ibge.integer' => 'O campo IBGE deve ser um número inteiro',
            ];

            $request->validate($regras, $feedback);
            $estabelecimento = new Estabelecimento();
            $estabelecimento->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        } 

        return view('dashboard.estabelecimento.index', ['msg' => $msg]);
    }

    public function listar() {

        $estabelecimentos = Estabelecimento::with(['categoria'])->get();

        return view('dashboard.estabelecimento.listar', ['estabelecimentos' => $estabelecimentos]);
    }
}
