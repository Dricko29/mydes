@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
  <nav
    class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
    data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="{{ url('/') }}">
            <span class="brand-logo">
              <img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_logo')) }}" alt="" style="height: 30px">
            </span>
            <h2 class="brand-text mb-0">{{ settings()->group('umum')->get('app_nama', 'MYDES') }}</h2>
          </a>
        </li>
      </ul>
    </div>
  @else
    <nav
      class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ $configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType'] === 'navbar-floating'? 'container-xxl': '' }}">
@endif
<div class="navbar-container d-flex content">
  <div class="bookmark-wrapper d-flex align-items-center">
    <ul class="nav navbar-nav d-xl-none">
      <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
            data-feather="menu"></i></a></li>
    </ul>
    {{-- <ul class="nav navbar-nav bookmark-icons">
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/email') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon"
            data-feather="mail"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/chat') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon"
            data-feather="message-square"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/calendar') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar"><i class="ficon"
            data-feather="calendar"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/todo') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo"><i class="ficon"
            data-feather="check-square"></i></a></li>
    </ul> --}}
    {{-- <ul class="nav navbar-nav">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link bookmark-star">
          <i class="ficon text-warning" data-feather="star"></i>
        </a>
        <div class="bookmark-input search-input">
          <div class="bookmark-input-icon">
            <i data-feather="search"></i>
          </div>
          <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
          <ul class="search-list search-list-bookmark"></ul>
        </div>
      </li>
    </ul> --}}
  </div>
  <ul class="nav navbar-nav align-items-center ms-auto">
    <li class="nav-item dropdown dropdown-language">
      <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true">
        <i class="flag-icon flag-icon-id"></i>
        <span class="selected-language">Indonesia</span>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
        <a class="dropdown-item" href="{{ url('lang/id') }}" data-language="id">
          <i class="flag-icon flag-icon-id"></i> Indonesia
        </a>
        <a class="dropdown-item" href="{{ url('lang/en') }}" data-language="en">
          <i class="flag-icon flag-icon-us"></i> English
        </a>
      </div>
    </li>
    {{-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
          data-feather="{{ $configData['theme'] === 'dark' ? 'sun' : 'moon' }}"></i></a></li>
    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
          data-feather="search"></i></a>
      <div class="search-input">
        <div class="search-input-icon"><i data-feather="search"></i></div>
        <input class="form-control input" type="text" placeholder="Explore {{ settings()->group('umum')->get('app_nama') }}..." tabindex="-1" data-search="search">
        <div class="search-input-close"><i data-feather="x"></i></div>
        <ul class="search-list search-list-main"></ul>
      </div>
    </li> --}}
    <li class="nav-item dropdown dropdown-notification me-25">
      <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class="ficon" data-feather="bell"></i>
        <span class="badge rounded-pill bg-danger badge-up">{{ Auth::user()->unreadNotifications->count() }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
        <li class="dropdown-menu-header">
          <div class="dropdown-header d-flex">
            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
            <div class="badge rounded-pill badge-light-primary"> New</div>
          </div>
        </li>
        <li class="scrollable-container media-list">
          @foreach (Auth::user()->unreadNotifications as $notification )     
          <a class="d-flex" href="javascript:void(0)">
            <div class="list-item d-flex align-items-start">
              <div class="me-1">
                <a href="{{ url($notification->data['link']) }}"><i class="ficon" data-feather="bell"></i>{{ $notification->markAsRead(); }}</a>
              </div>
              <div class="list-item-body flex-grow-1">
                <p class="media-heading"><span class="fw-bolder">{{ $notification->data['title'] }}</span></p>
                <small class="notification-text">{{ $notification->data['messages'] }}</small>
              </div>
            </div>
          </a>
          @endforeach
        </li>
        {{-- <li class="dropdown-menu-footer">
          <a class="btn btn-primary w-100" href="javascript:void(0)">Read all notifications</a>
        </li> --}}
      </ul>
    </li>
    <li class="nav-item dropdown dropdown-user">
      <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
        data-bs-toggle="dropdown" aria-haspopup="true">
        <div class="user-nav d-sm-flex d-none">
          <span class="user-name fw-bolder">
            @if (Auth::check())
              {{ Auth::user()->name }}
            @else
              User
            @endif
          </span>
          <span class="user-status">
            {{ Auth::user()->roles->pluck('name')->first() }}
          </span>
        </div>
        <span class="avatar">
          <img class="round"
            src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('images/portrait/small/avatar-s-11.jpg') }}"
            alt="avatar" height="40" width="40">
          <span class="avatar-status-online"></span>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
        <h6 class="dropdown-header">Manage Profile</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item"
          href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0)' }}">
          <i class="me-50" data-feather="user"></i> Profile
        </a>
        @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
          <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
            <i class="me-50" data-feather="key"></i> API Tokens
          </a>
        @endif
        <a class="dropdown-item" href="#">
          <i class="me-50" data-feather="settings"></i> Settings
        </a>

        @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Manage Team</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"
            href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
            <i class="me-50" data-feather="settings"></i> Team Settings
          </a>
          @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
            <a class="dropdown-item" href="{{ route('teams.create') }}">
              <i class="me-50" data-feather="users"></i> Create New Team
            </a>
          @endcan

          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">
            Switch Teams
          </h6>
          <div class="dropdown-divider"></div>
          @if (Auth::user())
            @foreach (Auth::user()->allTeams() as $team)
              {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}

              <x-jet-switchable-team :team="$team" />
            @endforeach
          @endif
        @endif
        @if (Auth::check())
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="me-50" data-feather="power"></i> Logout
          </a>
          <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
          </form>
        @else
          <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
            <i class="me-50" data-feather="log-in"></i> Login
          </a>
        @endif
      </div>
    </li>
  </ul>
</div>
</nav>

{{-- Search Start Here --}}
<ul class="main-search-list-defaultlist d-none">
  <li class="d-flex align-items-center">
    <a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Files</h6>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
      <div class="d-flex">
        <div class="me-75">
          <img src="{{ asset('images/icons/xls.png') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">Two new item submitted</p>
          <small class="text-muted">Marketing Manager</small>
        </div>
      </div>
      <small class="search-data-size me-50 text-muted">&apos;17kb</small>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
      <div class="d-flex">
        <div class="me-75">
          <img src="{{ asset('images/icons/jpg.png') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">52 JPG file Generated</p>
          <small class="text-muted">FontEnd Developer</small>
        </div>
      </div>
      <small class="search-data-size me-50 text-muted">&apos;11kb</small>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
      <div class="d-flex">
        <div class="me-75">
          <img src="{{ asset('images/icons/pdf.png') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">25 PDF File Uploaded</p>
          <small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div>
      <small class="search-data-size me-50 text-muted">&apos;150kb</small>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
      <div class="d-flex">
        <div class="me-75">
          <img src="{{ asset('images/icons/doc.png') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna_Strong.doc</p>
          <small class="text-muted">Web Designer</small>
        </div>
      </div>
      <small class="search-data-size me-50 text-muted">&apos;256kb</small>
    </a>
  </li>
  <li class="d-flex align-items-center">
    <a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Members</h6>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
      <div class="d-flex align-items-center">
        <div class="avatar me-75">
          <img src="{{ asset('images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">John Doe</p>
          <small class="text-muted">UI designer</small>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
      <div class="d-flex align-items-center">
        <div class="avatar me-75">
          <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">Michal Clark</p>
          <small class="text-muted">FontEnd Developer</small>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
      <div class="d-flex align-items-center">
        <div class="avatar me-75">
          <img src="{{ asset('images/portrait/small/avatar-s-14.jpg') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">Milena Gibson</p>
          <small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
      <div class="d-flex align-items-center">
        <div class="avatar me-75">
          <img src="{{ asset('images/portrait/small/avatar-s-6.jpg') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna Strong</p>
          <small class="text-muted">Web Designer</small>
        </div>
      </div>
    </a>
  </li>
</ul>

{{-- if main search not found! --}}
<ul class="main-search-list-defaultlist-other-list d-none">
  <li class="auto-suggestion justify-content-between">
    <a class="d-flex align-items-center justify-content-between w-100 py-50">
      <div class="d-flex justify-content-start">
        <span class="me-75" data-feather="alert-circle"></span>
        <span>No results found.</span>
      </div>
    </a>
  </li>
</ul>
{{-- Search Ends --}}
<!-- END: Header-->
