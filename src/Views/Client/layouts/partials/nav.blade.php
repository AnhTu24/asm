<nav id="nav">
  <ul class="links">
      <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="{{ request()->is('generic') ? 'active' : '' }}"><a href="{{ url('/generic') }}">Giới thiệu</a></li>
      <li class="{{ request()->is('elements') ? 'active' : '' }}"><a href="{{ url('/elements') }}">Dịch vụ</a></li>
      {{-- Thêm các mục menu khác tại đây --}}
  </ul>
  <ul class="actions primary">
      @guest
          <li><a href="{{ route('login') }}" class="button primary">Đăng nhập</a></li>
          @if (Route::has('register'))
              <li><a href="{{ route('register') }}" class="button">Đăng ký</a></li>
          @endif
      @else
          <li class="dropdown">
              <a href="#" class="dropdown-toggle">{{ Auth::user()->name }}</a>
              <ul class="dropdown-menu">
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </ul>
          </li>
      @endguest
  </ul>
</nav>
