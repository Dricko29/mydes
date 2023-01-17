@extends('layouts/contentLayoutMaster')

@section('title', 'Form '.__('Add').' Persyaratan Surat')

@section('content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('Add') }} Persyaratan | {{ $surat->nama }}</h4>
          <a href="{{ route('site.surat.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('site.assign.persyaratan.surat', $surat->id) }}" method="post">
            @csrf
          <div class="col-12">
            <h4 class="mt-2">Persyaratan</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-bolder">
                      Pilih Semua
                      <span data-bs-toggle="tooltip" data-bs-placement="top" title="Semua persyaratan akan diterapkan">
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
                    @foreach($persyaratan as $item)
                        <tr>
                            <td>
                                <div class="form-check me-3 me-lg-5">
                                <input class="form-check-input" type="checkbox" name="persyaratan[]" id="{{ $item->id }}" value="{{ $item->id }}" {{ in_array($item->id,$surat_syarat)   ? 'checked' : null }}/>
                                <label class="form-check-label" for="{{ $item->id }}"> {{ $item->nama }} </label>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 mt-2">
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
