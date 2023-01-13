@extends('layouts/detachedLayoutMaster')

@section('title', 'Detail Pengaduan')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

{{-- @section('content-sidebar')
@include('/content/pages/page-blog-sidebar')
@endsection --}}

@section('content')
<!-- Blog Detail -->
<div class="blog-detail-wrapper">
  <div class="row">
    <!-- Blog -->
    <div class="col-12">
      <div class="card">
        <img
          src="{{asset($pengaduan->foto ? $pengaduan->foto : 'images/banner/banner-12.jpg')}}"
          class="img-fluid card-img-top"
          alt="Blog Detail Pic"
        />
        <div class="card-body">
          <h4 class="card-title">{{ $pengaduan->judul }}</h4>
          <div class="d-flex mb-2">
            <div class="author-info">
              <small class="text-muted me-25">@lang('By')</small>
              <small><a href="#" class="text-body">{{ $pengaduan->nama }}</a></small>
              <span class="text-muted ms-50 me-25">|</span>
              <small class="text-muted">{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M Y') }}</small>
            </div>
          </div>
          {{-- <div class="my-1 py-25">
            <a href="#">
              <span class="badge rounded-pill badge-light-danger me-50">Gaming</span>
            </a>
            <a href="#">
              <span class="badge rounded-pill badge-light-warning">Video</span>
            </a>
          </div> --}}
          <p class="card-text mb-2">
            {!! $pengaduan->isi !!}
          </p>
        </div>
      </div>
    </div>
    <!--/ Blog -->

    <!-- Blog Comment -->
    <div class="col-12 mt-1" id="blogComment">
      <h6 class="section-label mt-25">Tanggapan</h6>
      <div class="card">
        <div class="card-body">
          @foreach ($pengaduan->tanggapanPengaduans as $item)
              
          <div class="d-flex align-items-start mb-3">
            <div class="avatar me-75">
              <img src="{{ asset(App\Models\User::find($item->created_by)->profile_photo_url) }}" width="38" height="38" alt="Avatar" />
            </div>
            <div class="author-info">
              <h6 class="fw-bolder mb-25">{{ App\Models\User::find($item->created_by)->name }}</h6>
              <p class="card-text">{{ \Carbon\Carbon::parse(App\Models\User::find($item->created_by)->created_at)->format('d M Y') }}</p>
              <p class="card-text">
                {{ $item->respon }}
              </p>
              {{-- <a href="#">
                <div class="d-inline-flex align-items-center">
                  <i data-feather="corner-up-left" class="font-medium-3 me-50"></i>
                  <span>Reply</span>
                </div>
              </a> --}}
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!--/ Blog Comment -->

    <!-- Leave a Blog Comment -->
    <div class="col-12 mt-1">
      <h6 class="section-label mt-25">Tanggapi</h6>
      <div class="card">
        <div class="card-body">
          <form action="{{ route('site.tanggapan.pengaduan.store', $pengaduan->id) }}" class="form" method="post">
            @csrf
            <div class="row">

              <div class="col-12">
                <textarea class="form-control mb-2" name="respon" rows="4" placeholder="Comment"></textarea>
              </div>
              {{-- <div class="col-12">
                <div class="form-check mb-2">
                  <input type="checkbox" class="form-check-input" id="blogCheckbox" />
                  <label class="form-check-label" for="blogCheckbox"
                    >Save my name, email, and website in this browser for the next time I comment.</label
                  >
                </div>
              </div> --}}
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Post Comment</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/ Leave a Blog Comment -->
  </div>
</div>
<!--/ Blog Detail -->
@endsection
