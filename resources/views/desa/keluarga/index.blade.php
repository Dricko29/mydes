
@extends('layouts/contentLayoutMaster')

@section('title', 'Keluarga')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection


@section('content')
<!-- Ajax Sourced Server-side -->
<section id="ajax-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          {{-- <h4 class="card-title">List Keluarga</h4> --}}
            <div class="btn-group">
              <button
                class="btn btn-sm btn-primary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                @lang('Add')
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('site.keluarga.pendudukMasuk') }}">Penduduk Masuk</a>
                <a class="dropdown-item" href="{{ route('site.keluarga.create') }}">Dari Penduduk Yang Ada</a>
              </div>
            </div>
          {{-- <a href="{{ route('keluarga.create') }}" class="btn btn-sm btn-primary">@lang('Add')</a> --}}
        </div>
        <div class="card-datatable">
          <table class="datatables-ajax table-hover table table-responsive" style="width: 100%">
            <thead>
              <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px"></th>
                <th>Foto</th>
                <th>Nomor Keluarga</th>
                <th>Nama Kepala Keluarga</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Jumlah Anggota</th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>RW</th>
                <th>RT</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!--/ Ajax Sourced Server-side -->
@endsection


@section('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  {{-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script> --}}
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
    $(function () {
        var isRtl = $('html').attr('data-textdirection') === 'rtl';

        var dt_ajax_table = $('.datatables-ajax'),
            assetPath = '../../../app-assets/';

        if ($('body').attr('data-framework') === 'laravel') {
            assetPath = $('body').attr('data-asset-path');
        }

        if (dt_ajax_table.length) {
            var dt_ajax = dt_ajax_table.dataTable({
            processing: true,
            ajax: '{{ route('site.keluarga.index') }}', // JSON file to add data
            columns: [
              // columns according to JSON
              { data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false },
              // { data: 'aksi',orderable: false, searchable: false },
              { data: ' ' },
              { data: ' ' },
              { data: 'no_keluarga' },
              { data: 'nama' },
              { data: 'nik' },
              { data: 'jenis_kelamin' },
              { data: 'penduduks_count' },
              { data: 'alamat' },
              { data: 'dusun' },
              { data: 'rw' },
              { data: 'rt' },
            ],
            columnDefs: [
              {
                // User full name and username
                targets: 2,
                render: function (data, type, full, meta) {
                  var $name = full['nama'],
                    $image = full['foto'];
                  if ($image) {
                    // For Avatar image
                    var $output =
                      '<img src="' + $image + '" alt="Avatar" height="32" width="32">';
                  }
                  var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : '';
                  // Creates full output for row
                  var $row_output =
                    '<div class="d-flex justify-content-left align-items-center">' +
                    '<div class="avatar-wrapper">' +
                    '<div class="avatar ' +
                    colorClass +
                    ' me-1">' +
                    $output +
                    '</div>' +
                    '</div>' +
                    '<div class="d-flex flex-column">' +
                    '</div>' +
                    '</div>';
                  return $row_output;
                }
              },
              {
                // Actions
                targets: 1,
                title: 'Aksi',
                orderable: false,
                render: function (data, type, full, meta) {
                  var id = full['id'];
                  return (
                    '<a href="/site/keluarga/' + full['id'] +'" class="item-edit me-1" title="detail">' +
                    feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
                    '</a>'+
                    '<a href="/site/keluarga/' + full['id'] +'/edit" class="item-edit me-1" title="edit">' +
                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                    '</a>'+
                   '<a href="javascript:;" class="item-edit delete-record me-1" title="hapus" onclick="hapus('+full['id']+')" data-id="'+full['id']+'">' +
                    feather.icons['trash'].toSvg({ class: 'font-small-4' }) +
                    '</a>'
                  );
                }
              }
            ],
            dom:
            '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
            '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
            '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
            '>t' +
            '<"d-flex justify-content-between mx-2 row mb-1"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
            // dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                url:'{{ asset('datatables/id.json') }}',
                paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
                }
            },
            buttons: [
              {
                extend: 'collection',
                className: 'btn btn-outline-secondary dropdown-toggle me-2',
                text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                buttons: [
                  {
                    extend: 'print',
                    text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                    className: 'dropdown-item',
                    title: "Daftar Data Keluarga",
                    exportOptions: { columns: [0,3,4,5,6,7,8,9,10,11] }
                  },
                  {
                    extend: 'csv',
                    text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,3,4,5,6,7,8,9,10,11] }
                  },
                  {
                    extend: 'excel',
                    text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,3,4,5,6,7,8,9,10,11] }
                  },
                  {
                    extend: 'pdf',
                    text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,3,4,5,6,7,8,9,10,11] },
                    orientation: 'landscape',
                    title: "Daftar Data Keluarga",
                  },
                  {
                    extend: 'copy',
                    text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,3,4,5,6,7,8,9,10,11] }
                  }
                ],
                init: function (api, node, config) {
                  $(node).removeClass('btn-secondary');
                  $(node).parent().removeClass('btn-group');
                  setTimeout(function () {
                    $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                  }, 50);
                }
              },
            ],
            });
        }

        // Filter form control to default size for all tables
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
    });
    function hapus(e){
      var url = '{{ route("site.keluarga.destroy", ":id") }}';
          url = url.replace(':id', e);

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
                  method:'delete',
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
                          $('.datatables-ajax').DataTable().ajax.reload()
                        } else {
                          toastr['error'](res.msg, '{{ __('Failed') }}', {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true,
                          });
                          $('.datatables-ajax').DataTable().ajax.reload()
                      }
                  }
                });
          }
      });
    }
  </script>
@endsection
