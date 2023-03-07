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
<div class="table-responsive">
    <table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Cep</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>IBGE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estabelecimentos as $estabelecimento)
            <tr>
                <td>{{ $estabelecimento->id }}</td>
                <td>{{ $estabelecimento->nome}}</td>
                <td>{{ $estabelecimento->categoria->nome }}</td>
                <td>{{ $estabelecimento->descricao }}</td>
                <td>{{ $estabelecimento->cep }}</td>
                <td>{{ $estabelecimento->rua }}</td>
                <td>{{ $estabelecimento->bairro }}</td>
                <td>{{ $estabelecimento->cidade }}</td>
                <td>{{ $estabelecimento->estado }}</td>
                <td>{{ $estabelecimento->ibge }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
