@extends('dashboard.layouts.basico')
@section('titulo', 'Home')
@section('conteudo')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categorias</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard.categoria.listar') }}" role="button">Listar Categorias</a>
        </div>
    </div>
</div>
{{ $msg ?? '' }}
<form method="POST" action="{{ route('dashboard.categoria.adicionar')}}">
    @csrf
    <div class="form-group">
      <label for="nome">Nome da Categoria</label>
      <input type="text" class="form-control" id="nomeCategoria" name="nome" placeholder="Digite o nome da categoria de produtos">
      {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
@endsection
