<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <h6 class="sidebar-heading d-flex justify-content-between align-itens-center px-3  mb-1 text-muted">
              <span>Administrator</span>
            </h6>
            <a class="nav-link {{Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/posts*') ? 'active' : ''}}" href="/dashboard/posts">
              <span data-feather="book"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/users*') ? 'active' : ''}}" href="/dashboard/users">
                <span data-feather="user"></span>
                All Users
              </a>
          </li>
          
        </ul>

        @can('admin')
        
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/categories*') ? 'active' : ''}}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Product Categories
            </a>
        </li>
          <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/authors*') ? 'active' : ''}}" href="/dashboard/authors">
              <span data-feather="pen-tool"></span>
              Book Authors
            </a>
        </li>
      </li>
      <li class="nav-item">
      <a class="nav-link {{Request::is('dashboard/orders*') ? 'active' : ''}}" href="/dashboard/orders">
          <span data-feather="file-text"></span>
          Customer Orders
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::is('dashboard/reports*') ? 'active' : ''}}" href="/dashboard/reports">
          <span data-feather="dollar-sign"></span>
          Monthly Report
        </a>
    </li>
        </ul>
        @endcan
      </div>
    </nav>