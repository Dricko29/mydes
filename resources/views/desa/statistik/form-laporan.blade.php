@extends('layouts/contentLayoutMaster')

@section('title', 'Form Cetak Laporan Statistik')

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
                    <h4 class="card-title">Laporan Statistik Laporan Penduduk</h4>
                    <a href="{{ route('site.statistik.laporan.penduduk') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.statistik.cetak.laporan.statistik') }}" target="blank" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="tahun" value="{{ $tahun }}">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="pegawai_id">Pembuat Laporan</label>
                                <select class="form-select select2" id="pegawai_id" name="pegawai_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($pegawais as $item)   
                                        <option value="{{ $item->id }}" {{ old('pegawai_id') == $item->id ? 'selected' : '' }}>{{ $item->jabatan->nama }} - {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_laporan">Nomor Laporan</label>
                                    <input
                                    type="text"
                                    id="no_laporan"
                                    class="form-control @error('no_laporan')
                                        is-invalid
                                    @enderror"
                                    name="no_laporan"
                                    value="{{ old('no_laporan') }}"
                                    />
                                    @error('no_laporan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
