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
                    <a href="{{ route('user.surat.ajukan') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('user.kirim.permohonan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="surat_id" value="{{ $surat->id }}">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="penduduk_id">Penduduk</label>
                                <select class="form-select select2" id="penduduk_id" name="penduduk_id" required>
                                    <option value="{{ $layananMandiri->penduduk->id }}">{{ $layananMandiri->penduduk->nik }}-{{ $layananMandiri->penduduk->nama }}</option>
                                </select>
                                </div>
                            </div>                            
                            <div class="col-12 col-sm-12 mb-1">
                                <label class="form-label" for="ket">Keterangan</label>
                                <textarea class="form-control @error('ket') is-invalid @enderror" name="ket" id="ket" rows="3">{{ old('ket') }}</textarea>
                                @error('ket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12 mb-1">
                                <label class="form-label" for="tlp_aktif">No Telpon Aktif</label>
                                <input
                                type="text"
                                id="tlp_aktif"
                                name="tlp_aktif"
                                class="form-control @error('tlp_aktif')
                                    is-invalid
                                @enderror"
                                value="{{ old('tlp_aktif') }}"
                                />
                                @error('tlp_aktif')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <h4>Persyaratan</h4>
                            @forelse ($surat->syaratSurats as $item)
                                <div class="col-12 col-sm-12 mb-1">
                                    <label class="form-label" for="dokumen">{{ $item->nama }}</label>
                                    <input
                                    type="file"
                                    id="dokumen"
                                    name="dokumen[]"
                                    class="form-control @error('dokumen')
                                        is-invalid
                                    @enderror"
                                    required
                                    />
                                    @error( 'dokumen' )
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @empty
                                
                            @endforelse
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1">@lang('Kirim')</button>
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
