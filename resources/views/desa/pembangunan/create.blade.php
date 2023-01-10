@extends('layouts/contentLayoutMaster')

@section('title', __('Add').' Pembangunan')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pembangunan</h4>
                    <a href="{{ route('site.pembangunan.index') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.pembangunan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="nama">Nama Pembangunan</label>
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
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="volume">Volume</label>
                                    <input
                                    type="text"
                                    id="volume"
                                    class="form-control @error('volume')
                                        is-invalid
                                    @enderror"
                                    name="volume"
                                    value="{{ old('volume') }}"
                                    />
                                    @error('volume')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="waktu">Waktu</label>
                                    <input
                                    type="text"
                                    id="waktu"
                                    class="form-control @error('waktu')
                                        is-invalid
                                    @enderror"
                                    name="waktu"
                                    value="{{ old('waktu') }}"
                                    />
                                    @error('waktu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="lama">Lama</label>
                                <select class="form-select select2" id="lama" name="lama">
                                    <option value="Hari">Hari</option>
                                    <option value="Minggu">Minggu</option>
                                    <option value="Bulan">Bulan</option>
                                    <option value="Tahun">Tahun</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                <label class="form-label" for="sumber_dana_id">Sumber Dana</label>
                                <select class="form-select select2" id="sumber_dana_id" name="sumber_dana_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($sumber as $item)   
                                        <option value="{{ $item->id }}" {{ old('sumber_dana_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="tahun_anggaran">Tahun Anggaran</label>
                                    <input
                                    type="number"
                                    id="tahun_anggaran"
                                    class="form-control @error('tahun_anggaran')
                                        is-invalid
                                    @enderror"
                                    name="tahun_anggaran"
                                    value="{{ old('tahun_anggaran') }}"
                                    />
                                    @error('tahun_anggaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sb_pemerintah">Sumber Dana Pemerintah</label>
                                    <input
                                    type="number"
                                    id="sb_pemerintah"
                                    class="form-control item-anggaran @error('sb_pemerintah')
                                        is-invalid
                                    @enderror"
                                    name="sb_pemerintah"
                                    value="{{ old('sb_pemerintah',0) }}"
                                    />
                                    @error('sb_pemerintah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sb_provinsi">Sumber Dana Provinsi</label>
                                    <input
                                    type="number"
                                    id="sb_provinsi"
                                    class="form-control item-anggaran @error('sb_provinsi')
                                        is-invalid
                                    @enderror"
                                    name="sb_provinsi"
                                    value="{{ old('sb_provinsi',0) }}"
                                    />
                                    @error('sb_provinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sb_kab_kot">Sumber Dana Kab/Kota</label>
                                    <input
                                    type="number"
                                    id="sb_kab_kot"
                                    class="form-control item-anggaran @error('sb_kab_kot')
                                        is-invalid
                                    @enderror"
                                    name="sb_kab_kot"
                                    value="{{ old('sb_kab_kot',0) }}"
                                    />
                                    @error('sb_kab_kot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sb_swadaya">Sumber Dana Swadaya</label>
                                    <input
                                    type="number"
                                    id="sb_swadaya"
                                    class="form-control item-anggaran @error('sb_swadaya')
                                        is-invalid
                                    @enderror"
                                    name="sb_swadaya"
                                    value="{{ old('sb_swadaya',0) }}"
                                    />
                                    @error('sb_swadaya')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="anggaran">Angaran</label>
                                    <input
                                    type="number"
                                    id="anggaran"
                                    class="form-control @error('anggaran')
                                        is-invalid
                                    @enderror"
                                    name="anggaran"
                                    value="{{ old('anggaran',0) }}"
                                    readonly
                                    />
                                    @error('anggaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="sifat">Sifat Pembangunan</label>
                                <select class="form-select select2" id="sifat" name="sifat" required>
                                    <option value=""></option>
                                    <option value="1" {{ old('sifat') == 1 ? 'selected' : ''}}>Baru</option>
                                    <option value="2" {{ old('sifat') == 2 ? 'selected' : ''}}>Lanjut</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pelaksana">Pelaksan</label>
                                    <input
                                    type="text"
                                    id="pelaksana"
                                    class="form-control @error('pelaksana')
                                        is-invalid
                                    @enderror"
                                    name="pelaksana"
                                    value="{{ old('pelaksana') }}"
                                    />
                                    @error('pelaksana')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="lokasi">Lokasi</label>
                                    <input
                                    type="text"
                                    id="lokasi"
                                    class="form-control @error('lokasi')
                                        is-invalid
                                    @enderror"
                                    name="lokasi"
                                    value="{{ old('lokasi') }}"
                                    />
                                    @error('lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="manfaat">Manfaat</label>
                                    <textarea class="form-control @error('manfaat')
                                        is-invalid
                                    @enderror" id="manfaat" name="manfaat" rows="3">{{ old('manfaat') }}</textarea>
                                    @error('manfaat')
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
@endsection
@section('page-script')
  <script>
    $(function () {
        'use strict';
        var picker = $('.picker'),
            customDelimiter = $('.custom-delimiter-mask'),
            select = $('.select2');
        // select2
        select.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this
            .select2({
                placeholder: 'Pilih Data',
                dropdownParent: $this.parent()
            })
            .change(function () {
                $(this).valid();
            });
        });

        // Custom Delimiter
        $(document).on("keyup", ".item-anggaran", function() {
            var sum = 0;
            $(".item-anggaran").each(function(){
                sum += +$(this).val();
            });
            $("#anggaran").val(sum);
        });

        // Custom Delimiter
        if (customDelimiter.length) {
            new Cleave(customDelimiter, {
            delimiters: ['.', '.', '-'],
            blocks: [3, 3, 3, 2],
            uppercase: true
            });
        }

    });

  </script>
@endsection
