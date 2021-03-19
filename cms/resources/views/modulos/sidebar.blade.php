<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x:hidden">

    <!-- Brand Logo -->
    <a href="{{url('/inicio')}}" class="brand-link">
    <img src="{{url('/')}}/vistas/img/logotipo_orca_white.png" alt="AdminLTE Logo" class="brand-image-xs logo-xl" style="left: 20px"><br>
     <!-- <span class="brand-text font-weight-light">Rca tecnologia</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host"><div class="os-resize-observer observed" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer observed"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 222px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/vistas/img/usuarios/default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">

          {{ Auth::user()->name}}
         {{-- 
          @foreach ($administradores as $element)

            @if ($_COOKIE["email_login"] == $element->email)
               Hola, {{$element->name}}
            @endif
           
         @endforeach 
          --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <!--=====================================
          Botón Clientes
          ======================================-->

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
         
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("/aqua") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>AquaChile</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ url("/cliente_dos") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Multi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("/cliente_tres") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Aysen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("/cliente_cuatro") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S.Austral</p>
                </a>
              </li>
                       
            </ul>
          </li>
           
          

          <!--=====================================
          paginas web
          ======================================-->
{{--
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Ver Sitios Web
                <i class="right fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ substr(url("/"),0,-11) }}" class="nav-link active" target="_blank">
            
                  <i class="nav-icon fas fa-globe"></i>
                  
                  <p>Ver sitio Aqua</p>
      
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/informe-cliente/mul1_client" class="nav-link active" target="_blank">
              
                  <i class="nav-icon fas fa-globe"></i>
                  
                  <p>Ver sitio Multi</p>
      
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/informe-cliente/cliente-tres" class="nav-link active" target="_blank">
              
                  <i class="nav-icon fas fa-globe"></i>
                  
                  <p>Ver sitio Aysen</p>
                </a>
              </li>
             
              <li class="nav-item" >
                <a href="http://localhost/informe-cliente/sau1_client" class="nav-link active" target="_blank">
              
                  <i class="nav-icon fas fa-globe"></i>
                  
                  <p>Ver sitio Austral</p>
      
                </a>
              </li>
                       
            </ul>
          </li>
          --}}
          <!--=====================================
          Condicion si es administrador
          ======================================-->
{{--
          @foreach ($administradores as $element)

            @if ($element->rol == "administrador")
            
                
            @endif
              
          @endforeach
--}}
          <!--=====================================
          Botón Energia
          ======================================-->

          <li class="nav-item">
            <a href="https://vrm.victronenergy.com/installation-overview#%5Bobject%20Object%5D" class="nav-link ">
              <i class="nav-icon fas fa-battery-half"></i>
              <p>Estado Energia</p>
            </a>
          </li>

            <!--=====================================
          Botón ticket
          ======================================-->

          <li class="nav-item">
            <a href="http://orcatecnologias.cl/admin/?view=dashboard" class="nav-link ">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Pag. Ticket</p>
            </a>
          </li>

        
        
          <!--=====================================
          Botón administrador reportes, empresas
          ======================================-->

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Acceso Restringido
                <i class="right fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
              <a href="{{ url("/empresas") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empresas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("/reportes") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>

                    <!--=====================================
                Botón Administradores
                ======================================-->

              <li class="nav-item">
                <a href="{{ url("/administradores") }}" class="nav-link active">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Administradores</p>
                </a>
              </li>
                                          
            </ul>
          </li>
             

           <!--=====================================
          Botón Configuracion
          ======================================-->

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-biohazard"></i>
              <p>
                EN desarrollo
                <i class="right fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("/blog") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ url("/banner") }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
                                                   
            </ul>
          </li>
        
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 17.7265%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>