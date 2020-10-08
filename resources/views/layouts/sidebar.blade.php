<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/tes" class="brand-link text-center">
      <i class="fas fa-chart-area"></i> SPK
      <span class="brand-text font-weight-light">Lahan Porang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
        <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Home</p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="{{url('curah-hujan')}}" class="nav-link">
              <i class="nav-icon fas fa-water"></i>
              <p>Curah Hujan</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="{{url('ketinggian')}}" class="nav-link">
              <i class="nav-icon fas fa-arrows-alt-v"></i>
              <p>Ketinggian</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('naungan')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>Naungan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('ph-tanah')}}" class="nav-link">
              <i class="nav-icon fas fa-hourglass-half"></i>
              <p>Ph Tanah</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('suhu-udara')}}" class="nav-link">
              <i class="nav-icon fas fa-thermometer-half"></i>
              <p>Suhu Udara</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('tekstur-tanah')}}" class="nav-link">
              <i class="nav-icon fas fa-shapes"></i>
              <p>Tekstur Tanah</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p> 
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>

          <!-- <li class="nav-item">
            <a href="{{url('bobot')}}" class="nav-link">
              <i class="nav-icon fas fa-balance-scale-right"></i>
              <p>Bobot</p>
            </a>
          </li>          -->

        </ul>
      </nav>
    </div>
</aside>