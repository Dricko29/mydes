@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Keluarga')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
      <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection
@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Detail Keluarga</h4>
        <a href="{{ route('site.keluarga.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>@lang('Back')</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.keluarga.kartu',$keluarga) }}" class="btn btn-info btn-sm" title="print kartu keluarga">
            <i data-feather="book" class="me-25"></i>
            <span>@lang('Kartu')</span>
        </a>
        <a href="{{ route('site.keluarga.anggota.tambah', $keluarga->id) }}" class="btn btn-info btn-sm" title="print kartu keluarga">
            <i data-feather="user" class="me-25"></i>
            <span>@lang('Tambah Anggota')</span>
        </a>
        {{-- <p class="card-text">
          Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
          can use any example of below table for your table and it can be use with any type of bootstrap tables.
        </p> --}}
      </div>
      <div class="table-responsive">
        <table class="table">
            <tr>
              <th style="width: 250px">Nomor Keluarga</th>
              <td style="width: 20px">:</td>
              <td>{{ $keluarga->no_keluarga }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tanggal Terdaftar</th>
              <td style="width: 20px">:</td>
              <td>{{ $keluarga->tanggal_terdaftar }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tanggal Cetak</th>
              <td style="width: 20px">:</td>
              <td>{{ $keluarga->tanggal_cetak }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Alamat</th>
              <td style="width: 20px">:</td>
              <td>{{ $keluarga->alamat ? $keluarga->alamat : '-'  }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Dusun</th>
              <td style="width: 20px">:</td>
              <td>{{ $penduduk ? $penduduk->dusun->nama_dusun : '-' }}</td>
            </tr>
            <tr>
              <th style="width: 250px">RW / RT</th>
              <td style="width: 20px">:</td>
              <td>{{ $penduduk ? $penduduk->rukunWarga->nama_rw : '-' }} / {{ $penduduk ? $penduduk->rukunTetangga->nama_rt : '-' }}</td>
            </tr>
        </table>
      </div>
      
      <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">Anggota Keluarga</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Hubungan</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($keluarga->penduduks as $item)                 
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>
                            <div class="d-flex align-items-start me-2">
                              <a href="{{ route('site.penduduk.edit',$item->id) }}" class="btn btn-sm btn-primary me-1">
                                <i data-feather="edit" class="font-medium-2"></i>
                              </a>
                              {{-- <a href="#" class="btn btn-sm btn-primary me-1" onclick="hapus([{{ $keluarga->id }},{{ $item->id }}])">
                                <i data-feather="edit" class="font-medium-2"></i>
                              </a> --}}
                              <form action="{{ route('site.keluarga.anggota.delete', [$keluarga->id, $item->id]) }}" onsubmit="return confirm('yakin ?')" method="post">
                              @csrf
                              @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                  <i data-feather="delete" class="font-medium-2"></i></button>
                              </form>
                              {{-- <a href="#">
                                <span class="badge bg-light-danger p-75 rounded me-1">
                                  <i data-feather="delete" class="font-medium-2"></i>
                                </span>
                              </a> --}}
                            </div>
                          </td>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->nik }}</td>
                          <td>{{ $item->tanggal_lahir }}</td>
                          <td>{{ $item->attrKelamin->nama }}</td>
                          <td>{{ $item->attrHubungan->nama }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')
  <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
      <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
@endsection

@section('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script> --}}
  <script>
    $(function () {
      ('use strict');

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

      // variables
      var form = $('.validate-form'),
        picker = $('.picker'),
        accountUploadImg = $('#account-upload-img'),
        accountUploadBtn = $('#account-upload'),
        accountUserImage = $('.uploadedAvatar'),
        accountResetBtn = $('#account-reset'),
        accountNumberMask = $('.account-number-mask'),
        accountZipCode = $('.account-zip-code'),
        select2 = $('.select2');

      // Update user photo on click of button

      if (accountUserImage) {
        var resetImage = accountUserImage.attr('src');
        accountUploadBtn.on('change', function (e) {
          var reader = new FileReader(),
            files = e.target.files;
          reader.onload = function () {
            if (accountUploadImg) {
              accountUploadImg.attr('src', reader.result);
            }
          };
          reader.readAsDataURL(files[0]);
        });

        accountResetBtn.on('click', function () {
          accountUserImage.attr('src', resetImage);
        });
      }


      //phone
      if (accountNumberMask.length) {
        accountNumberMask.each(function () {
          new Cleave($(this), {
            phone: true,
            phoneRegionCode: 'US'
          });
        });
      }

      //zip code
      if (accountZipCode.length) {
        accountZipCode.each(function () {
          new Cleave($(this), {
            delimiter: '',
            numeral: true
          });
        });
      }

      // For all Select2
      if (select2.length) {
        select2.each(function () {
          var $this = $(this);
          $this.wrap('<div class="position-relative"></div>');
          $this.select2({
            dropdownParent: $this.parent()
          });
        });
      }
      // Picker
      if (picker.length) {
          picker.flatpickr({
            allowInput: true,
                  altInput: true,
      altFormat: 'd-m-Y',
      dateFormat: 'Y-m-d',
            onReady: function (selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                $(instance.mobileInput).attr('step', null);
                }
            }
          });
      }

        if (form.length) {
          form.validate({
            ignore: [],
            rules: {
                penduduk_id: {
                    required: true
                }
            },
            messages: {
                penduduk_id: "{{ __('The field is required!') }}",
            },
          });
        }
        
    });

    // function hapus(e){
    //   Swal.fire({
    //       title: '{{ __('Are you sure?') }}',
    //       text: '{{ __('You will delete this data!') }}',
    //       icon: 'warning',
    //       showCancelButton: true,
    //       confirmButtonText: '{{ __('Yes, Delete!') }}',
    //       customClass: {
    //       confirmButton: 'btn btn-primary',
    //       cancelButton: 'btn btn-outline-danger ms-1'
    //       },
    //       buttonsStyling: false
    //   }).then(function (result) {
    //       if (result.value) {
    //         var k = e[0];
    //         var i = e[1];
    //           $.ajax({
    //               url:`{{ url('site/keluarga/') }}/${k}/penduduk/${i}/delete`,
    //               method:'delete',
    //               headers:{
    //                   'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //               },
    //               success:function(res){
    //                   if (res.status == 'success') {
    //                       toastr['success'](res.msg, '{{ __('Success') }}', {
    //                           closeButton: true,
    //                           tapToDismiss: false,
    //                           progressBar: true,
    //                       });
    //                     } else {
    //                       toastr['error'](res.msg, '{{ __('Failed') }}', {
    //                         closeButton: true,
    //                         tapToDismiss: false,
    //                         progressBar: true,
    //                       });
    //                   }
    //               }
    //             });
    //       }
    //   });
    // }

  </script>
@endsection