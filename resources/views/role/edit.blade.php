@extends('layouts/contentLayoutMaster')

@section('title', 'Form '.__('Edit').' Role')

@section('content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('Edit') }} Role</h4>
          <a href="{{ route('site.roles.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('site.roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')
          <div class="col-12">
            <label class="form-label" for="name">Role Name</label>
            <input
              type="text"
              id="name"
              name="name"
              class="form-control @error('name')
                  is-invalid
              @enderror"
              placeholder="Enter role name"
              value="{{ old('name', $role->name) }}"
            />

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

          </div>
          <div class="col-12">
            <h4 class="mt-2 pt-50">Role Permissions</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-bolder">
                      Administrator Access
                      <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                        <i data-feather="info"></i>
                      </span>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll"> {{ __('Select All') }} </label>
                      </div>
                    </td>
                  </tr>
                    @foreach($modules as $module)
                        <tr>
                            <td class="text-nowrap fw-bolder">{{ Str::ucfirst($module['module']) }}</td>
                            <td>
                                <div class="d-flex">
                                    @foreach (\Spatie\Permission\Models\Permission::where('module', $module['module'])->get() as $perm)
                                        <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" name="permission[]" id="{{ $perm->id }}" value="{{ $perm->id }}" {{ $role->hasPermissionTo($perm->id) ? 'checked' : null }}/>
                                        <label class="form-check-label" for="{{ $perm->id }}"> {{ Str::remove($module['module'], $perm->name) }} </label>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center mt-2">
            <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              {{ __('Cancel') }}
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection

{{-- @section('vendor-script')
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
@endsection --}}

@section('page-script')

  <script>
      // Select All checkbox click
      const selectAll = document.querySelector('#selectAll'),
        checkboxList = document.querySelectorAll('[type="checkbox"]');
      selectAll.addEventListener('change', t => {
        checkboxList.forEach(e => {
          e.checked = t.target.checked;
        });
      });

  </script>
@endsection
