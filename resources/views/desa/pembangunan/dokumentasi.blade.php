@extends('layouts/contentLayoutMaster')

@section('title', 'Dokumentasi')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection


@section('content')
<!-- Blog List -->
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $pembangunan->nama }} - {{ $pembangunan->lokasi }}</h4>
            <a href="{{ route('site.pembangunan.index') }}" class="btn btn-primary btn-sm">
                <i data-feather="arrow-left" class="me-25"></i>
                <span>@lang('Back')</span>
            </a>
        </div>
        <div class="card-body">
            <a href="{{ route('site.dokumentasi.pembangunan.detail.create', $pembangunan->id) }}" class="btn btn-success btn-sm" title="tambah dokumentasi">
                <i data-feather="plus" class="me-25"></i>
                <span>@lang('Add')</span>
            </a>
        </div>
    </div>
  </div>
</div>
<div class="blog-list-wrapper">
  <!-- Blog List Items -->
  <div class="row">
      @foreach ($pembangunan->dokumentasiPembangunans as $dok)
      <div class="col-md-4 col-12">
          <div class="card">
              <img class="card-img-top img-fluid" src="{{ $dok->gambar ?  Storage::disk('public')->url($dok->gambar) : asset('images/desa/pembangunan/default.jpeg') }}" alt="Dokumentasi" />
              <div class="card-body">
              <div class="d-flex">
                    <div class="author-info">
                        <small><a href="#" class="text-body">{{ $pembangunan->lokasi }}</a></small>
                        <span class="text-muted ms-50 me-25">|</span>
                        <small class="text-muted">{{ $dok->tanggal }}</small>
                    </div>
              </div>
              <div class="my-1 py-25">
                    <a href="#">
                        <i data-feather="trending-up" class="font-medium-1 text-body me-50"></i>
                        <span class="badge rounded-pill badge-light-info me-50">{{ $dok->progres }} %</span>
                    </a>
              </div>
              <p class="card-text blog-content-truncate">
                  {{ $dok->keterangan }}
              </p>
              <hr>
                <div class="d-flex justify-content-between align-items-center">
                    {{-- <a href="{{ route('site.dokumentasiPembangunan.edit', [$pembangunan->id, $dok->id]) }}" class="fw-bold">Edit</a> --}}
                    <a href="#" class="fw-bold" onclick="hapus([{{$pembangunan->id }},{{ $dok->id }}])">Hapus</a>
                </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
  <!--/ Blog List Items -->

</div>
<!--/ Blog List -->
@endsection
@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
@endsection

@section('page-script')
    <script>
    @if (Session::has('success'))
      toastr['success']("{{ session('success') }}", '{{ __('Success') }}', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true,
      }); 
      @elseif (Session::has('error'))
      toastr['error']("{{ session('error') }}", '{{ __('Failed') }}', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true,
      }); 
    @endif
    function hapus(e){
      var p = e[0];
      var d = e[1];
      var url = `{{ url('site/dokumentasi/pembangunan/') }}/${p}/dokumentasiPembangunan/${d}`;

      Swal.fire({
          title: '{{ __('Are you sure?') }}',
          text: '{{ __('You will delete this data!') }}',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: '{{ __('Yes, Delete!') }}',
          customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
          },
          buttonsStyling: false
      }).then(function (result) {
          if (result.value) {
              $.ajax({
                  url:url,
                  method:'DELETE',
                  headers:{
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                  },
                  success:function(res){
                      if (res.status == 'success') {
                          toastr['success'](res.msg, '{{ __('Success') }}', {
                              closeButton: true,
                              tapToDismiss: false,
                              progressBar: true,
                          });
                          setInterval(function(){ location.reload(); }, 2000);
                        } else {
                          toastr['error'](res.msg, '{{ __('Failed') }}', {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true,
                          });
                          setInterval(function(){ location.reload(); }, 2000);
                      }
                  }
                });
          }
      });
    }
    </script>
@endsection
