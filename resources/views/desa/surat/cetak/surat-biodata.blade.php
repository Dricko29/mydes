@extends('layouts/contentLayoutMaster')

@section('title', 'Form Cetak Laporan Inventaris')

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
                    <a href="#" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.cetak.surat.biodata') }}" target="blank" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- <input type="hidden" name="inv-jenis" value="{{ $jenis }}"> --}}
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="penduduk_id">Penduduk</label>
                                <select class="form-select select2" id="penduduk_id" name="penduduk_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($penduduks as $item)   
                                        <option value="{{ $item->id }}" {{ old('penduduk_id') == $item->id ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1">@lang('Print')</button>
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
