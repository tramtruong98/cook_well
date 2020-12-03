<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      @if (Auth::user())
      <a class="navbar-brand" href="/home">CookWell</a>
      @else
      <a class="navbar-brand" href="/">CookWell</a> 
      @endif   
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="col-lg-4 sidebar ftco-animate">
      <div class="sidebar-box">
        <form action="/search-posts" class="search-form" method="POST">
          @csrf
          <div class="form-group">
            <span class="icon ion-ios-search"></span>
            <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
          </div>
        </form>
      </div>
      </div>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          @if (Auth::user())
          <li class="nav-item active"><a href="/home" class="nav-link">Home</a></li>        
          @else
          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
          @endif
          <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
          <li class="nav-item dropdown">
            @if (Auth::user())
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi {{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="/profile">My profile</a>
                <a class="dropdown-item" href="/my-blog">My recipe</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
            @else
            <li class="nav-item"><a href="/login" class="nav-link">Log in</a></li>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->