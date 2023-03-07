@extends('dashboard.layouts.basico')
@section('titulo', 'Home')
@section('conteudo')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estabelecimentos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard.estabelecimento.listar') }}" role="button">Listar Estabelecimentos</a>
        </div>
    </div>
</div>
{{ $msg ?? '' }}
<form method="POST" action="{{ route('dashboard.estabelecimento.adicionar')}}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nomeEstabelecimento" name="nome" placeholder="Digite o nome...">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
      </div>
      <div class="form-group col-md-4">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricaoEstabelecimento" name="descricao" rows="1" placeholder="Digite a descrição..."></textarea>
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
      </div>
      <div class="form-group col-md-4">
        <label for="categoria">Categoria</label>
        <select class="form-control" name="categoria_id">
            @isset($categorias)
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            @endisset
        </select>
        {{ $errors->has('categoria') ? $errors->first('categoria') : '' }}
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="cep">Cep</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o cep...">
            {{ $errors->has('cep') ? $errors->first('cep') : '' }}
        </div>
        <div class="form-group col-md-10">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua">
            {{ $errors->has('rua') ? $errors->first('rua') : '' }}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro">
          {{ $errors->has('bairro') ? $errors->first('bairro') : '' }}
        </div>
        <div class="form-group col-md-3">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade">
          {{ $errors->has('cidade') ? $errors->first('cidade') : '' }}
        </div>
        <div class="form-group col-md-4">
            <label for="uf">Estado</label>
            <input type="text" class="form-control" id="uf" name="estado">
            {{ $errors->has('estado') ? $errors->first('estado') : '' }}
        </div>
        <div class="form-group col-md-2">
            <label for="ibge">IBGE</label>
            <input type="text" class="form-control" id="ibge" name="ibge">
            {{ $errors->has('ibge') ? $errors->first('ibge') : '' }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection