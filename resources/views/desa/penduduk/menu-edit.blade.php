      <li class="nav-item">
        <a class="nav-link {{ $title == 'biodata' ? 'active' : '' }}" href="{{ route('site.penduduk.statusDasar', $penduduk->id) }}">
          <i data-feather="user" class="font-medium-3 me-50"></i>
          <span class="fw-bold">@lang('Biodata')</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == 'mati' ? 'active' : '' }}" href="{{ route('site.penduduk.mati', $penduduk->id) }}">
          <i data-feather="user-minus" class="font-medium-3 me-50"></i>
          <span class="fw-bold">@lang('Mati')</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == 'pindah' ? 'active' : '' }}" href="{{ route('site.penduduk.pindah', $penduduk->id) }}">
          <i data-feather="send" class="font-medium-3 me-50"></i>
          <span class="fw-bold">@lang('Pindah')</span>
        </a>
      </li>