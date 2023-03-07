@extends('dashboard.layouts.basico')
@section('titulo', 'Home')
@section('conteudo')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pedido</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard.pedido.listar') }}" role="button">Listar Pedidos</a>
        </div>
    </div>
</div>
{{ $msg ?? '' }}
<form method="POST" action="{{ route('dashboard.produto.adicionar')}}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="produto">Produto</label>
            <select class="form-control" name="produto_id">
                @isset($produtos)
                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                @endisset
            </select>
            {{ $errors->has('produto') ? $errors->first('produto') : '' }}
          </div>
      </div>
    <button type="submit" class="btn btn-primary">Realizar Pedido</button>
</form>
@endsection