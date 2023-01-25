<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
      <a class="navbar-brand" href="/"><i class="bi bi-house-door-fill"></i>Perdana Aksara</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="/cart"><i class="bi bi-cart"></i> | Cart</a>
            {{-- {{ ($title === " Home") ? 'title' : '' }}  ini buat highlight page yg active di navbar--}}
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/belanja"><i class="bi bi-shop"></i> | Store</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="/history"><i class="bi bi-clock-history"></i> | History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories"><i class="bi bi-collection"></i> | Categories</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="/email"><i class="bi bi-mail"></i> | Email</a>
          </li>       
          <li class="nav-item">
            <a class="nav-link" href="/reset"><i class="bi bi-mail"></i> | Passwordreset</a>
          </li>       
        </ul>

        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome Back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @can('admin')
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            @endcan
            <li>
            <form action="/logout" method ="post">
              @csrf
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
            </form>  
            </li>
          </ul>
        </li>
        @else
          <li class="nav-item">
            <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
          <!-- navbar buat yg udh login -->
        </ul>
      </div>
    </div>
  </nav>