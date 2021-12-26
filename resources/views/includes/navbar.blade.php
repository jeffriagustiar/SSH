<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/logo.png') }}" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kota Payakumbuh</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <br>
          
          @guest
          {{-- <li class="nav-header">Masuk</li> --}}
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <p>
                Sign-In
              </p>
            </a>
          </li>
          @endguest


          @auth
          {{-- <li class="nav-header">Menu SSH</li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                SSH
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @php
                  if (Auth::user()->level == 'user' || Auth::user()->level == 'root') 
                  {
              @endphp
                  <li class="nav-item">
                    <a href="{{ route('data-ssh') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengajuan SSH</p>
                    </a>
                  </li>
              @php
                  }
              @endphp
              @php
                if (Auth::user()->level == 'verifikator' || Auth::user()->level == 'root') 
                {
              @endphp
                <li class="nav-item">
                  <a href="{{ route('data-keputusan') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List SSH </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('data-ssh-sah') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List SSH Sah</p>
                  </a>
                </li>
              @php
                  }
              @endphp
              
              @php
                if (Auth::user()->level == 'upload' || Auth::user()->level == 'root') 
                {
              @endphp
                <li class="nav-item">
                  <a href="{{ route('data-ssh-download') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Download SSH </p>
                  </a>
                </li>
              @php
                  }
              @endphp
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                SBU
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @php
                  if (Auth::user()->level == 'user' || Auth::user()->level == 'root') 
                  {
              @endphp
                  <li class="nav-item">
                    <a href="{{ route('data-sbu') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengajuan SBU</p>
                    </a>
                  </li>
              @php
                  }
              @endphp
              @php
                if (Auth::user()->level == 'verifikator' || Auth::user()->level == 'root') 
                {
              @endphp
                <li class="nav-item">
                  <a href="{{ route('data-keputusan-sbu') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List SBU </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('data-sbu-sah') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List SBU Sah</p>
                  </a>
                </li>
              @php
                  }
              @endphp
              
              @php
                if (Auth::user()->level == 'upload' || Auth::user()->level == 'root') 
                {
              @endphp
                <li class="nav-item">
                  <a href="{{ route('data-sbu-download') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Download SBU </p>
                  </a>
                </li>
              @php
                  }
              @endphp
            </ul>
          </li>


          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                HSPK
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @php
                  if (Auth::user()->level == 'user' || Auth::user()->level == 'root') 
                  {
              @endphp
                  <li class="nav-item">
                    <a href="{{ route('data-hspk') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengajuan HSPK</p>
                    </a>
                  </li>
              @php
                  }
              @endphp
              @php
                if (Auth::user()->level == 'verifikator' || Auth::user()->level == 'root') 
                {
              @endphp
                <li class="nav-item">
                  <a href="{{ route('data-keputusan-hspk') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List hspk </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('data-hspk-sah') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List HSPK Sah</p>
                  </a>
                </li>
              @php
                  }
              @endphp
              
              @php
                if (Auth::user()->level == 'upload' || Auth::user()->level == 'root') 
                {
              @endphp
                <li class="nav-item">
                  <a href="{{ route('data-hspk-download') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Download HSPK </p>
                  </a>
                </li>
              @php
                  }
              @endphp
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sing out
              </p>
            </a>
          </li>
          

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @endauth

          



          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>