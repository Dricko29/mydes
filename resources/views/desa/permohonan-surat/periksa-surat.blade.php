@extends('layouts/contentLayoutMaster')

@section('title', 'Form Cetak Surat Pengantar')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')

@if ($surat->is == 1)
    @include('desa.permohonan-surat.form-periksa-surat-pengantar')
@else
    @include('desa.permohonan-surat.form-periksa-surat-biodata')
@endif

<!-- Modal to add new user starts-->
<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
    <div class="modal-dialog">
    <form class="add-new-user modal-content pt-0" action="{{ route('site.permohonanSurat.tolak', $permohonan->id) }}" method="post">
        @csrf
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Penolakan</h5>
        </div>
        <div class="modal-body flex-grow-1">
        <div class="mb-1">
            <label class="form-label" for="pesan">Pesan</label>
            <input
            type="text"
            class="form-control"
            id="pesan"
            placeholder="pesan"
            name="pesan"
            required
            />
        </div>
        <button type="submit" class="btn btn-primary me-1 data-submit">@lang('Save')</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
        </div>
    </form>
    </div>
</div>
<!-- Modal to add new user Ends-->

@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  <script>
    $(function () {
        'use strict';
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
        var picker = $('.picker'),
            numeralMask = $('.custom-delimiter-mask'),
            select = $('.select2');
        // select2
        select.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this
            .select2({
                placeholder: 'Pilih Data',
                dropdownParent: $this.parent()
            });
        });
        // // Picker
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
        //Numeral
        if (numeralMask.length) {
            new Cleave(numeralMask, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
            });
        }
        
    });

  </script>
@endsection
