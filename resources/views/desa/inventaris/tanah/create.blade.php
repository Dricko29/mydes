@extends('layouts/contentLayoutMaster')

@section('title', 'Tambah Inventaris Tanah')

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
                    <h4 class="card-title">Data Inventaris Tanah</h4>
                    <a href="{{ route('site.inventarisTanah.index') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.inventarisTanah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="kategori_tanah_id">Kategori Tanah</label>
                                <select class="form-select select2" id="kategori_tanah_id" name="kategori_tanah_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($kategoriTanah as $item)   
                                        <option value="{{ $item->id }}" {{ old('kategori_tanah_id') == $item->id ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="nama">Nama<span class="text-danger">  *otomatis terisi jika dikosongkan!!</span></label>
                                    <input
                                    type="text"
                                    id="nama"
                                    class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                    name="nama"
                                    value="{{ old('nama') }}"
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
                                    <label class="form-label" for="kode">Kode<span class="text-danger">  *otomatis terisi jika dikosongkan!!</span></label>
                                    <input
                                    type="text"
                                    id="kode"
                                    class="form-control @error('kode')
                                        is-invalid
                                    @enderror"
                                    name="kode"
                                    value="{{ old('kode') }}"
                                    placeholder="T-XXXXX-XXXXX"
                                    />
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_register">No Register<span class="text-danger">  *otomatis terisi jika dikosongkan!!</span></label>
                                    <input
                                    type="text"
                                    id="no_register"
                                    class="form-control @error('no_register')
                                        is-invalid
                                    @enderror"
                                    name="no_register"
                                    value="{{ old('no_register') }}"
                                    placeholder="XX.XX.22.CT-XXXXX"
                                    />
                                    @error('no_register')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="luas">Luas</label>
                                    <div class="input-group input-group-merge mb-2">
                                        {{-- <span class="input-group-text">$</span> --}}
                                        <input type="number" class="form-control @error('luas')
                                            is-invalid
                                        @enderror" name="luas"
                                        value="{{ old('luas') }}"/>
                                        @error('luas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <span class="input-group-text">m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="tahun">Tahun Pengadaan</label>
                                    <input
                                    type="number"
                                    id="tahun"
                                    class="form-control @error('tahun')
                                        is-invalid
                                    @enderror"
                                    name="tahun"
                                    value="{{ old('tahun') }}"
                                    />
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="hak_tanah_id">Hak Tanah</label>
                                <select class="form-select select2" id="hak_tanah_id" name="hak_tanah_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($hakTanah as $item)   
                                        <option value="{{ $item->id }}" {{ old('hak_tanah_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="penggunaan_id">Penggunaan</label>
                                <select class="form-select select2" id="penggunaan_id" name="penggunaan_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($penggunaan as $item)   
                                        <option value="{{ $item->id }}" {{ old('penggunaan_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="pengguna_barang_id">Pengguna Barang</label>
                                <select class="form-select select2" id="pengguna_barang_id" name="pengguna_barang_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($penggunaBarang as $item)   
                                        <option value="{{ $item->id }}" {{ old('pengguna_barang_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="asal_id">Asal</label>
                                <select class="form-select select2" id="asal_id" name="asal_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($asal as $item)   
                                        <option value="{{ $item->id }}" {{ old('asal_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="tanggal_sertifikat">Tanggal Sertifikat</label>
                                <input type="text" class="form-control @error('tanggal_sertifikat')
                                    is-invalid
                                @enderror picker" name="tanggal_sertifikat" id="tanggal_sertifiat" value="{{ old('tanggal_sertifikat') }}" autocomplete="off"/>
                                @error('tanggal_sertifikat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_sertifikat">No Sertifikat</label>
                                    <input
                                    type="text"
                                    id="no_sertifikat"
                                    class="form-control @error('no_sertifikat')
                                        is-invalid
                                    @enderror"
                                    name="no_sertifikat"
                                    value="{{ old('no_sertifikat') }}"
                                    />
                                    @error('no_sertifikat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="harga">Harga</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control custom-delimiter-mask item-harga @error('harga')
                                            is-invalid
                                        @enderror"
                                        id="harga"
                                        name="harga"
                                        value="{{ old('harga') }}"
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
                                    <label class="form-label" for="alamat">Alamat Tanah</label>
                                    <textarea class="form-control @error('alamat')
                                        is-invalid
                                    @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                    @error('alamat')
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
                                    @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
