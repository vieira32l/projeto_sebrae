<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index() {
        return view('dashboard.categoria.index');
    }

    public function adicionar(Request $request) {

        if($request->input('_token') != '' && $request->input('id') == '') {
            
            $msg = '';

            $regras = [
                'nome' => 'required|min:3|max:40',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido!',
                'nome.min' => 'O campo Nome da Categoria deve ter no mínimo 3 caracteres!',
                'nome.max' => 'O campo Nome da Categoria deve ter no máximo 40 caracteres!',
            ];

            $request->validate($regras, $feedback);
            $categoria = new Categoria();
            $categoria->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }        
        return view('dashboard.categoria.index', ['msg' => $msg]);
    }

    public function listar () {

        $categorias = DB::table('categorias')->get();

        return view('dashboard.categoria.listar', ['categorias' => $categorias]);
    }
}
