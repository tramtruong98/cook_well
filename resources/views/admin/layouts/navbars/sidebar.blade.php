<div class="logo">
  <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
  </a>
</div>
<div class="sidebar-wrapper">
  <ul class="nav">
      <li class="nav-item">
          <a class="nav-link" href="{{ route('dasboard') }}">
              <i class="material-icons">dashboard</i>
              <p>{{ __('Dashboard') }}</p>
          </a>
      </li>
      <li class="nav-item">
          {{-- <a class="nav-link" data-toggle="collapse"
              href="#laravelExample" aria-expanded="true">
              <i><img style="width:25px" src="{{ asset('assets/img/laravel.svg') }}"></i>
              <p>{{ __('Laravel Examples') }}
                  <b class="caret"></b>
              </p>
          </a> --}}
          <div class="collapse show" id="laravelExample">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('profile.edit') }}">
                          <span class="sidebar-mini"> UP </span>
                          <span class="sidebar-normal">{{ __('User profile') }} </span>
                      </a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ route('user.index') }}">
                          <span class="sidebar-mini"> UM </span>
                          <span class="sidebar-normal"> {{ __('User Management') }} </span>
                      </a>
                  </li>
              </ul>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('course.index') }}">
              <i class="material-icons">content_paste</i>
              <p>{{ __('Table List') }}</p>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('recipe.index') }}">
              <i class="material-icons">library_books</i>
              <p>{{ __('Typography') }}</p>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('tag.index') }}">
              <i class="material-icons">bubble_chart</i>
              <p>{{ __('Icons') }}</p>
          </a>
      </li>
      {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('map') }}">
              <i class="material-icons">location_ons</i>
              <p>{{ __('Maps') }}</p>
          </a>
      </li> --}}
      {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('notifications') }}">
              <i class="material-icons">notifications</i>
              <p>{{ __('Notifications') }}</p>
          </a>
      </li> --}}
      {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('language') }}">
              <i class="material-icons">language</i>
              <p>{{ __('RTL Support') }}</p>
          </a>
      </li> --}}
      {{-- <li
          class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
          --}}
          {{-- <a class="nav-link text-white bg-danger"
              href="{{ route('upgrade') }}"> --}}
              {{-- <i class="material-icons text-white">unarchive</i>
              <p>{{ __('Upgrade to PRO') }}</p>
          </a>
      </li> --}}
  </ul>
</div>
</div>