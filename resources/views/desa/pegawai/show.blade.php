@extends('layouts/contentLayoutMaster')

@section('title', 'Pegawai - Detail')

@section('vendor-style')
  {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-12 col-lg-6 col-md-6 order-1 order-md-0">
      <!-- User Card -->
      <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a href="{{ route('site.pegawai.index') }}" class="btn btn-primary">List Pegawai</a>
            </div>
        </div>
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <img
                class="img-fluid rounded mt-3 mb-2"
                src="{{asset($pegawai->foto ? $pegawai->foto : 'images/portrait/small/avatar-s-2.jpg')}}"
                height="110"
                width="110"
                alt="User avatar"
              />
              <div class="user-info text-center">
                <h4>{{ $pegawai->nama }}</h4>
                <span class="badge bg-light-secondary">{{ $pegawai->jabatan->nama }}</span>
              </div>
            </div>
          </div>
          {{-- <div class="d-flex justify-content-around my-2 pt-75">
            <div class="d-flex align-items-start me-2">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="check" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">1.23k</h4>
                <small>Tasks Done</small>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="briefcase" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">568</h4>
                <small>Projects Done</small>
              </div>
            </div>
          </div> --}}
          <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
          <div class="info-container">
              
            <ul class="list-unstyled">
            <li class="mb-75">
                <span class="fw-bolder me-25">NIK:</span>
                <span>{{ $pegawai->nik }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">NIP:</span>
                <span>{{ $pegawai->nip }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Status:</span>
                <span class="badge bg-light-success">{{ $pegawai->status ? 'Aktif' : 'Nonaktif' }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">TTD:</span>
                <span class="badge bg-light-success">{{ $pegawai->ttd ? 'Aktif' : 'Nonaktif' }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">TTL:</span>
                <span>{{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Jenis Kelamin:</span>
                <span>{{ $pegawai->attrKelamin->nama }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Pendidikan:</span>
                <span>{{ $pegawai->attrPendidikanKeluarga->nama }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Agama:</span>
                <span>{{ $pegawai->attrAgama->nama }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Nomor Pengangkatan:</span>
                <span>{{ $pegawai->no_skp }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Tgl Pengangkatan:</span>
                <span>{{ $pegawai->tanggal_skp }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Nomor Pemberhentian:</span>
                <span>{{ $pegawai->no_skb }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Tgl Pemberhentian:</span>
                <span>{{ $pegawai->tanggal_skb }}</span>
            </li>
            <li class="mb-75">
                <span class="fw-bolder me-25">Masa Jabatan:</span>
                <span>{{ $pegawai->masa_jabatan }}</span>
            </li>
            </ul>
            <div class="d-flex justify-content-center">
              {{-- <a href="javascript:;" class="btn btn-primary me-1 edit-pegawai" data-id="{{ $pegawai->id }}">
                Edit
              </a> --}}
              {{-- <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                Edit
              </a> --}}
              <a href="{{ route('site.pegawai.status', $pegawai->id) }}" class="btn btn-outline-danger me-1">{{ $pegawai->status ? 'Nonaktifkan' : 'Aktifkan' }} Status</a>
              <a href="{{ route('site.pegawai.ttd', $pegawai->id) }}" class="btn btn-outline-danger">{{ $pegawai->ttd ? 'Nonaktifkan' : 'Aktifkan' }} TTD</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->
  </div>
</section>

{{-- @include('desa.pegawai.edit') --}}
<!-- Edit User Modal -->
<div class="modal fade" id="editPegawai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-pegawai">
    </div>
</div>
<!--/ Edit User Modal -->
@include('content/_partials/_modals/modal-upgrade-plan')
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  {{-- data table --}}
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  {{-- <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script> --}}
    <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script>
    $(function () {

        @if (Session::has('success'))
        toastr['success']("{{ session('success') }}", '{{ __('locale.'.'Berhasil') }}', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        }); 
        @elseif (Session::has('error'))
        toastr['error']("{{ session('error') }}", 'Gagal', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        }); 
        @endif

        var modal = new bootstrap.Modal($('#editPegawai'));

        $('.edit-pegawai').on('click', function(){
            var data = $(this).data();
            var id = data.id;

            $.ajax({
                url:'{{ url('pegawai/') }}/'+id+'/edit',
                method:'GET',
                success:function(res){
                    $('#editPegawai').find('.modal-dialog').html(res);
                    var select2 = $('.select2');
                    var basicPickr = $('.flatpickr-basic');
                    modal.show()
                    // select2
                    if (select2.length) {
                            select2.each(function () {
                            var $this = $(this);
                            $this.wrap('<div class="position-relative"></div>').select2({
                                dropdownParent: $this.parent()
                            });
                        });
                    }
                    // Date
                    basicPickr.flatpickr();
                    update()
                }
            });

            function update(){
                $('#editPegawaiForm').on('submit', function(e){
                    var _form = this
                    var formData = new FormData(_form)
                    e.preventDefault()
                    $.ajax({
                        url:$(this).attr('action'),
                        method:$(this).attr('method'),
                        processData:false,
                        contentType:false,
                        data:formData,
                        success:function(res)
                        {
                            console.log(res);
                            modal.hide()
                        }
                    })
                })
            }
        });

    });


  </script>
@endsection
