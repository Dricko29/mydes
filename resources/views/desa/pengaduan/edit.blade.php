@extends('layouts/contentLayoutMaster')

@section('title', 'Respon Pengaduan')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data</h4>
                    <a href="{{ route('site.pengaduan.index') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select select2" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="0" {{ old('status', $pengaduan->status) ==  0 ? 'selected' : '' }}>Menunggu Diproses</option>
                                    <option value="1" {{ old('status', $pengaduan->status) ==  1 ? 'selected' : '' }}>Sedang Diproses</option>
                                    <option value="2" {{ old('status',$pengaduan->status) ==  2 ? 'selected' : '' }}>Sudah Diproses</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="respon">Respon</label>
                                    <textarea 
                                    name="respon" 
                                    id="respon" 
                                    rows="5" 
                                    class="form-control @error('respon')
                                        is-invalid
                                    @enderror">{{ old('respon', $respon->respon) }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1">@lang('Save')</button>
                                <button type="reset" class="btn btn-outline-secondary">@lang('Cancel')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js'))}}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <script>
    $(function () {
        'use strict';
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
