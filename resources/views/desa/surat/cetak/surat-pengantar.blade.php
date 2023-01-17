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

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Cetak Surat Pengantar</h4>
                    <div class="d-flex">
                        <a href="{{ route('site.cetak.surat') }}" class="btn btn-primary me-1">@lang('Cetak Surat')</a>
                        <a href="{{ route('site.permohonanSurat.index') }}" class="btn btn-warning">@lang('Daftar Permohonan')</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.surat.pengantar.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="surat" value="{{ $surat->id }}">
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
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="nomor" class="form-label">Format Surat ({{ $surat->klasifikasiSurat->kode }}/{{ str_pad(App\Models\NomorSurat::where('surat_id', $surat->id)->max('serial')+1, 3, '0', STR_PAD_LEFT) }}/{{ \Carbon\Carbon::now()->format('m') }}/{{ \Carbon\Carbon::now()->format('Y') }})</label>
                                    <input type="text" class="form-control @error('nomor')
                                        is-invalid
                                    @enderror" 
                                    name="nomor" 
                                    value="{{ $surat->klasifikasiSurat->kode }}/{{ str_pad(App\Models\NomorSurat::where('surat_id', $surat->id)->max('serial')+1, 3, '0', STR_PAD_LEFT) }}/{{ \Carbon\Carbon::now()->format('m') }}/{{ \Carbon\Carbon::now()->format('Y') }}">
                                    @error('nomor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 mb-1">
                                <label class="form-label" for="keperluan">Keperluan</label>
                                <textarea class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan" rows="3">{{ old('keperluan') }}</textarea>
                                @error('keperluan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12 mb-1">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="tanggal_awal">Masa Berlaku Awal</label>
                                <input type="text" class="form-control picker @error('tanggal_awal')
                                    is-invalid
                                @enderror" 
                                name="tanggal_awal" 
                                id="tanggal_awal" 
                                value="{{ old('tanggal_awal',\Carbon\Carbon::now()) }}" 
                                autocomplete="off"/>
                                @error('tanggal_awal')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="tanggal_akhir">Masa Berlaku Akhir</label>
                                <input type="text" class="form-control picker @error('tanggal_akhir')
                                    is-invalid
                                @enderror" 
                                name="tanggal_akhir" 
                                id="tanggal_akhir" 
                                value="{{ old('tanggal_akhir',\Carbon\Carbon::now()) }}" 
                                autocomplete="off"/>
                                @error('tanggal_akhir')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="pegawai_id">TTD</label>
                                <select class="form-select select2" id="pegawai_id" name="pegawai_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($pegawais as $item)   
                                        <option value="{{ $item->id }}" {{ old('pegawai_id') == $item->id ? 'selected' : '' }}>{{ $item->nip }} - {{ $item->nama }} - {{ $item->jabatan->nama }}</option>
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
