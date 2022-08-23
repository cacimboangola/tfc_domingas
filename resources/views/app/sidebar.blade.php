<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
      <div class="sidebar-header">
          <div class="d-flex justify-content-between">
              <div class="logoS">
                  <a href="#">APP</a>
              </div>
              <div class="toggler">
                  <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
          </div>
      </div>
      <div class="sidebar-menu">
          <ul class="menu">
              <li class="sidebar-title">Menu</li>
              <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <span style="color: #5ddab4">Dominas Caconda </span>
                </a>
                <ul class="submenu ">
                  <li class="submenu-item {{ (request()->is('grupos*')) ? 'active' : ''  }}">
                      <a href="">Redifinir senha</a>
                  </li>
                  <li class="submenu-item {{ (request()->is('grupos*')) ? 'active' : ''  }}">
                      <a href="">Sair</a>
                  </li>

                </ul>
                </li>
              <li class="sidebar-item {{ (request()->is('home*')) ? 'active' : ''  }}">
                  <a href="" class='sidebar-link'>
                      <i class="bi bi-grid-fill"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Pessoal</span>
                </a>
                <ul class="submenu ">
                    @if (true)
                    <li class="submenu-item ">
                        <a href="">Usuários</a>
                    </li>
                    @endif

                </ul>
              </li>
              <li class="sidebar-item  {{ (request()->is('materiais*')) ? 'active' : ''  }}">
                  <a href="{{ route('material.index')}}" class='sidebar-link'>
                      <i class="bi bi-puzzle"></i>
                      <span>Materiais</span>
                  </a>
              </li>
              <li class="sidebar-item  {{ (request()->is('categorias*')) ? 'active' : ''  }}">
                <a href="" class='sidebar-link'>
                    <i class="bi bi-file"></i>
                    <span>Categorias</span>
                </a>
            </li>
              <li class="sidebar-item  {{ (request()->is('compras*')) ? 'active' : ''  }}">
                <a href="" class='sidebar-link'>
                    <i class="bi bi-shop"></i>
                    <span>Compras</span>
                </a>
            </li>
              <li class="sidebar-item  ">
                <a href="#" class='sidebar-link fixed-bottom'>
                    <span style="font-size: 10px">Desenvolvido por Domingas - Caconda &copy; 2022</span>
                </a>
            </li>
          </ul>
      </div>
  </div>
</div>
