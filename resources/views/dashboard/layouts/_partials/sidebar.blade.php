<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
       <ul class="nav flex-column">
          <li class="nav-item">
             <a class="nav-link active" href="{{ route('dashboard.home') }}">
             <span data-feather="home"></span>
             Home <span class="sr-only">(current)</span>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard.pedido') }}">
             <span data-feather="file"></span>
             Pedidos
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard.produto') }}">
             <span data-feather="shopping-cart"></span>
             Produtos
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard.estabelecimento') }}">
             <span data-feather="users"></span>
             Estabelecimentos
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard.categoria') }}">
             <span data-feather="layers"></span>
             Categorias
             </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Identificar Pedidos
            </a>
          </li>
       </ul>
    </div>
 </nav>