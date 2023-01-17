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
              <img src="{{ $item->Creator->profile_photo_url }}" width="38" height="38" alt="Avatar" />
            </div>
            <div class="author-info">
              <h6 class="fw-bolder mb-25">{{ $item->Creator->name }}</h6>
              <p class="card-text">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
              <p class="card-text">
                {{ $item->respon }}
              </p>
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
                <textarea class="form-control mb-2" name="respon" rows="4" placeholder="Tanggapan"></textarea>
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
                <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
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
