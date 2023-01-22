
@extends('layouts/contentLayoutMaster')

@section('title', 'Penduduk')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
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
          <h4 class="card-title">Log Penduduk Lahir</h4>
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
              {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ Route('site.penduduk.lahir') }}">Penduduk Lahir</a>
                <a class="dropdown-item" href="{{ route('site.penduduk.masuk') }}">Penduduk Masuk</a>
              </div> --}}
            </div>
        </div>
        {{-- <div class="card-body border-bottom">
          <div class="row">
            <div class="col-md-4">
              <label class="form-label" for="status">Status</label>
              <select class="form-select select2" id="status" name="status">
                <option value="">Semua</option>
                @foreach ($statusPenduduk as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label" for="kelamin">Kelamin</label>
              <select class="form-select select2" id="kelamin" name="kelamin">
                <option value="">Semua</option>
                @foreach ($kelaminPenduduk as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div> --}}

        <div class="card-datatable">
          <table class="datatables-ajax table-hover table pt-0 table-responsive" style="width: 100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No Akta Kelahiran</th>
                <th>Waktu Kelahiran</th>
                <th>Tempat Dilahirkan</th>
                <th>Jenis Kelahiran</th>
                <th>Penolong Kelahiran</th>
                <th>Berat Kelahiran</th>
                <th>Panjang Kelahiran</th>
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
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
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
            select2 = $('.select2');

        if ($('body').attr('data-framework') === 'laravel') {
            assetPath = $('body').attr('data-asset-path');
        }

        if (dt_ajax_table.length) {
            var dt_ajax = dt_ajax_table.dataTable({
            processing: true,
            ajax: '{{ route('site.log.penduduk.lahir') }}', // JSON file to add data
            columns: [
              // columns according to JSON
              // { data: 'aksi',orderable: false, searchable: false },
              { data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false },
              { data: 'penduduk.nama' },
              { data: 'penduduk.nik' },
              { data: 'penduduk.attr_kelamin.nama' },
              { data: 'penduduk.tanggal_lahir' },
              { data: 'penduduk.tempat_lahir' },
              { data: 'penduduk.no_akta_kelahiran' },
              { data: 'penduduk.waktu_kelahiran' },
              { data: 'penduduk.tempat_dilahirkan' },
              { data: 'penduduk.jenis_kelahiran' },
              { data: 'penduduk.penolong_kelahiran' },
              { data: 'penduduk.berat_kelahiran' },
              { data: 'penduduk.panjang_kelahiran' },
            ],
            columnDefs: [

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
                    title: "Daftar Data Penduduk Lahir",
                    exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12] }
                  },
                  {
                    extend: 'csv',
                    text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12] }
                  },
                  {
                    extend: 'excel',
                    text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12] }
                  },
                  {
                    extend: 'pdf',
                    text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12] },
                    orientation: 'landscape',
                    title: "Daftar Data Penduduk Lahir",
                  },
                  {
                    extend: 'copy',
                    text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12] }
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
              {
                text: 'Hapus',
                className: 'bulk_delete btn btn-danger',
                init: function (api, node, config) {
                  $(node).removeClass('btn-secondary');
                }
              }
            ],
            });
        }

        // Filter form control to default size for all tables
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');

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
    //   $(document).ready(function(){
    //     $("#status").on("change", function () {
    //       dt_ajax_table.on('preXhr.dt', function ( e, settings, data ) {
    //           data.status = $('#status').val();
    //       })
    //       $('.datatables-ajax').DataTable().ajax.reload()
    //     });
    //     $("#kelamin").on("change", function () {
    //       dt_ajax_table.on('preXhr.dt', function ( e, settings, data ) {
    //           data.kelamin = $('#kelamin').val();
    //       })
    //       $('.datatables-ajax').DataTable().ajax.reload()
    //     });
    //   });

      // bulk delete
      $(document).on('click', '.bulk_delete', function(){
          var id = [];
          {
              $('.dt-checkboxes:checked').each(function(){
                  id.push($(this).val());
              });
              if(id.length > 0)
              {
                Swal.fire({
                    title: '{{ __('Are you sure?') }}',
                    text: '{{ __('You will delete this data!') }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{ __('Yes, Delete!') }}',
                    cancelButtonText: '{{ __('Cancel') }}',
                    customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url:'{{ route('site.penduduk.bulkDelete') }}',
                            data:{id:id},
                            method:'post',
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
              else
              {
                  alert("{{ __('Please select the data to be deleted') }}");
              }
          }
      });

    });

    // single delete
    function hapus(e){
      var url = '{{ route("site.penduduk.destroy", ":id") }}';
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
