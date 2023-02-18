      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/home" class="nav-link">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                  Dashboard
                </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/files" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Files
                </p>
                </a>
              </li>

              @can('isAdmin')
              <li class="nav-item">
                <a href="/users" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Manage Users
                </p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                <a href="/files" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profile
                </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-power-off red"></i>
                  <p>
                    {{ __('Logout') }}
                  </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>  

        </ul>
      </nav>
