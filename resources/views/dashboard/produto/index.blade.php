@extends('dashboard.layouts.basico')
@section('titulo', 'Home')
@section('conteudo')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard.produto.listar') }}" role="button">Listar Produtos</a>
        </div>
    </div>
</div>
{{ $msg ?? '' }}
<form method="POST" action="{{ route('dashboard.produto.adicionar')}}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nomeProduto">Nome</label>
        <input type="text" class="form-control" id="nomeProduto" name="nome" placeholder="Digite o nome...">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
      </div>
      <div class="form-group col-md-6">
        <label for="precoProduto">Preço</label>
        <input type="text" class="form-control" id="precoProduto" name="preco" placeholder="R$:0,00">
        {{ $errors->has('preco') ? $errors->first('preco') : '' }}
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="estabelecimento">Estabelecimento</label>
            <select class="form-control" name="estabelecimento_id">
                @isset($estabelecimentos)
                    @foreach($estabelecimentos as $estabelecimento)
                        <option value="{{$estabelecimento->id}}">{{$estabelecimento->nome}}</option>
                    @endforeach
                @endisset
            </select>
            {{ $errors->has('estabelecimento') ? $errors->first('estabelecimento') : '' }}
          </div>
        <div class="form-group col-md-6">
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
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<script>
$(document).ready(function()
{
     $("#precoProduto").maskMoney({
         prefix: "R$:",
         decimal: ",",
         thousands: "."
     });
});
</script>
@endsection