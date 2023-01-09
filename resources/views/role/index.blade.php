@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<h3>Roles List</h3>
<p class="mb-2">
  {{ __('A role provided access to predefined menus and features so that depending on assigned role an administrator can have access to what he need') }}
</p>

<!-- Role cards -->
<div class="row" id="listRole">

</div>
<!--/ Role cards -->

@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/pages/modal-add-role.js')) }}"></script> --}}
  <script>
    (function () {

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
      $(document).ready(function(){
        loadList()
      })

      // delete
      $(document).on('click', '.btn-delete', function(){
        var data = $(this).data('id');
        hapus(data)
      })


      // fungsi load
      function loadList(){
        $.ajax({
          url :'{{ route('site.roles.list') }}',
          method:'GET',
          cache:false,
          success:function(res){
            $('#listRole').html(res)
          }
        })
      }

      // funsi hapus
      function hapus(e){
        var url = '{{ route("site.roles.destroy", ":id") }}';
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
                            loadList()
                          } else {
                            toastr['error'](res.msg, '{{ __('Failed') }}', {
                              closeButton: true,
                              tapToDismiss: false,
                              progressBar: true,
                            });
                            loadList()
                        }
                    }
                  });
            }
        });
      }

    })();

  </script>
  <script src="{{ asset(mix('js/scripts/pages/app-access-roles.js')) }}"></script>
@endsection
