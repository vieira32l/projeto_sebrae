@php
   use Illuminate\Support\Facades\DB;
   $saldo = DB::table('pedidos')->get()->last()->saldo;
@endphp
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Desafio Técnico SEBRAE</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisa de categorias, estabelecimentos ou produtos" aria-label="Pesquisa">
    <ul class="navbar-nav px-3">
       <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Saldo: R$ {{ number_format((float)$saldo, 2, '.', '') }}</a>
       </li>
    </ul>
 </nav>