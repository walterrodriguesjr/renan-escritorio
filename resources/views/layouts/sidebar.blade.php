<style>
    /* Largura inicial do sidebar recuado */
.main-sidebar {
  width: 74px; /* Largura recuada */
  transition: width 0.3s; /* Efeito de transição suave */
  height: 845px !important;
}

/* Largura expandida do sidebar */
.main-sidebar.expanded {
  width: 250px; /* Largura expandida */
}

/* Largura dos itens do menu no sidebar recuado */
.main-sidebar.collapsed .nav-treeview > li.nav-item > a.nav-link {
  width: 50px; /* Mesma largura do sidebar recuado */
}

/* Ajusta a posição do conteúdo principal */
.content-wrapper {
  margin-left: 74px; /* Largura do sidebar recuado */
  padding: 20px; /* Espaçamento interno para o conteúdo */
}

/* Quando o sidebar estiver recolhido */
.main-sidebar.collapsed .user-panel .info {
        display: none;
    }

    /* Quando o sidebar estiver expandido */
    .main-sidebar.expanded .user-panel .info {
        display: inline-block;
    }

    .logout-link {
    background-color: #f2f2f2; /* Cor de fundo cinza */
  }

  .logout-link {
    background-color: grey; /* Cor de fundo cinza */
    transition: background-color 0.3s; /* Transição suave para a cor de fundo */
  }

  .logout-link:hover {
    color: black !important; /* Cor de fundo preto quando hover */
  }

</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; top: 0; left: 0; bottom: 0;">
  
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <div class="user-panel mt-2 pb-2 mb-2 d-flex">
      <div class="image">
        <img src="img/image-user-sidebar.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <span class="brand-text font-weight-light" id="span-teste" style="display: none;">{{ Auth::user()->name }}</span>
      </div>
    </div>
  </a>

  
  <!-- Sidebar -->
  <div class="sidebar">
    
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="img/image-user-sidebar.png" class="img-circle elevation-2" alt="User Image">
      </div>
       <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             
        <li class="nav-item menu-close">
          <a href="{{ route('dashboard') }}" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p style="display: none">
                Home
            </p>
        </a>
        </li>
        <li class="nav-item menu-close">
          <a href="{{ route('clientes') }}" class="nav-link active">
            <i class="nav-icon fas fa-users"></i>
            <p style="display: none">
                Clientes
            </p>
        </a>
        </li>
        @if (auth()->user()->userDados && auth()->user()->userDados->tipoAcessoUsuario !== 'Usuário')
       <li class="nav-item menu-close">
            <a href="{{ route('administrador') }}" class="nav-link active">
                <i class="nav-icon fas fa-lock"></i>
            <p>Administrador</p>
        </a>
    </li>
@endif

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
              <!-- ... outros itens do menu ... -->
      
              <li class="nav-item menu-close">
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
      
                      <a href="#" class="nav-link logout-link" style="background-color: grey" onclick="event.preventDefault(); this.closest('form').submit();">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p style="display: none">Sair</p>
                      </a>
      
                  </form>
              </li>
          </ul>
      </nav>
        
       
      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Modal de confirmação -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="logoutModalLabel">Confirmação de Logout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Tem certeza de que deseja sair?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="confirmLogout">Sair</button>
          </div>
      </div>
  </div>
</div>

  
  
  