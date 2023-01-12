@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Inventaris Konstruksi Berjalan')

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
                    <h4 class="card-title">Data Inventaris Konstruksi Berjalan</h4>
                    <a href="{{ route('site.inventarisKonstruksiBerjalan.index') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.inventarisKonstruksiBerjalan.update', $inventarisKonstruksiBerjalan) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input
                                    type="text"
                                    id="nama"
                                    class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                    name="nama"
                                    value="{{ old('nama',$inventarisKonstruksiBerjalan->nama) }}"
                                    />
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="fisik_bangunan_id">Fisik Bangunan</label>
                                <select class="form-select select2" id="fisik_bangunan_id" name="fisik_bangunan_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($fisikBangunan as $item)   
                                        <option value="{{ $item->id }}" {{ old('fisik_bangunan_id',$inventarisKonstruksiBerjalan->fisik_bangunan_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="luas_bangunan">Luas Bangunan</label>
                                    <div class="input-group input-group-merge mb-2">
                                        {{-- <span class="input-group-text">$</span> --}}
                                        <input type="number" class="form-control @error('luas_bangunan')
                                            is-invalid
                                        @enderror" name="luas_bangunan"
                                        value="{{ old('luas_bangunan',$inventarisKonstruksiBerjalan->luas_bangunan) }}"/>
                                        @error('luas_bangunan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <span class="input-group-text">m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="bertingkat">Bertingkat</label>
                                    <div class="input-group input-group-merge mb-2">
                                        {{-- <span class="input-group-text">$</span> --}}
                                        <input type="number" class="form-control @error('bertingkat')
                                            is-invalid
                                        @enderror" name="bertingkat"
                                        value="{{ old('bertingkat',$inventarisKonstruksiBerjalan->bertingkat) }}"/>
                                        @error('bertingkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <span class="input-group-text">Lantai</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="beton">Konstruksi Beton</label>
                                <select class="form-select select2" id="beton" name="beton" required>
                                    <option value="1" {{ old('beton',$inventarisKonstruksiBerjalan->beton) == 1 ? 'selected' : '' }} selected>Ya</option>
                                    <option value="0" {{ old('beton',$inventarisKonstruksiBerjalan->beton) == 0 ? 'selected' : '' }}>Tidak</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="text" class="form-control @error('tanggal_mulai')
                                    is-invalid
                                @enderror picker" 
                                name="tanggal_mulai" 
                                id="tanggal_mulai" 
                                value="{{ old('tanggal_mulai',$inventarisKonstruksiBerjalan->tanggal_mulai) }}" 
                                autocomplete="off"/>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="tanggal_dokumen_bangunan">Tanggal Dokumen</label>
                                <input type="text" class="form-control @error('tanggal_dokumen_bangunan')
                                    is-invalid
                                @enderror picker" 
                                name="tanggal_dokumen_bangunan" 
                                id="tanggal_dokumen_bangunan" 
                                value="{{ old('tanggal_dokumen_bangunan',$inventarisKonstruksiBerjalan->tanggal_dokumen_bangunan) }}" 
                                autocomplete="off"/>
                                @error('tanggal_dokumen_bangunan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_bangunan">No Bangunan</label>
                                    <input
                                    type="text"
                                    id="no_bangunan"
                                    class="form-control @error('no_bangunan')
                                        is-invalid
                                    @enderror"
                                    name="no_bangunan"
                                    value="{{ old('no_bangunan',$inventarisKonstruksiBerjalan->no_bangunan) }}"
                                    />
                                    @error('no_bangunan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="status_tanah_id">Status Tanah</label>
                                <select class="form-select select2" id="status_tanah_id" name="status_tanah_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($statusTanah as $item)   
                                        <option value="{{ $item->id }}" {{ old('status_tanah_id',$inventarisKonstruksiBerjalan->status_tanah_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="luas_tanah">Luas Tanah</label>
                                    <div class="input-group input-group-merge mb-2">
                                        {{-- <span class="input-group-text">$</span> --}}
                                        <input type="number" class="form-control @error('luas_tanah')
                                            is-invalid
                                        @enderror" name="luas_tanah"
                                        value="{{ old('luas',$inventarisKonstruksiBerjalan->luas_tanah) }}"/>
                                        @error('luas_tanah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <span class="input-group-text">m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="kode_tanah">Kode Tanah</label>
                                    <input
                                    type="text"
                                    id="kode_tanah"
                                    class="form-control @error('kode_tanah')
                                        is-invalid
                                    @enderror"
                                    name="kode_tanah"
                                    value="{{ old('kode_tanah',$inventarisKonstruksiBerjalan->kode_tanah) }}"
                                    />
                                    @error('kode_tanah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="asal_id">Asal</label>
                                <select class="form-select select2" id="asal_id" name="asal_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($asal as $item)   
                                        <option value="{{ $item->id }}" {{ old('asal_id',$inventarisKonstruksiBerjalan->asal_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="harga">Harga</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control custom-delimiter-mask item-harga @error('harga')
                                            is-invalid
                                        @enderror"
                                        id="harga"
                                        name="harga"
                                        value="{{ old('harga',$inventarisKonstruksiBerjalan->harga) }}"
                                        />
                                        @error('harga')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="lokasi">Lokasi</label>
                                    <textarea class="form-control @error('lokasi')
                                        is-invalid
                                    @enderror" id="lokasi" name="lokasi" rows="3">{{ old('lokasi',$inventarisKonstruksiBerjalan->lokasi) }}</textarea>
                                    @error('lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="keterangan">Keterangan</label>
                                    <textarea class="form-control @error('keterangan')
                                        is-invalid
                                    @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan',$inventarisKonstruksiBerjalan->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1">{{ __('locale.'.'Simpan') }}</button>
                                <button type="reset" class="btn btn-outline-secondary">{{ __('locale.'.'Batal') }}</button>
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
