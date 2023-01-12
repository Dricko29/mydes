@extends('layouts/contentLayoutMaster')

@section('title', 'Tambah Inventaris Asset Tetap')

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
                    <h4 class="card-title">Data Inventaris Asset Tetap</h4>
                    <a href="{{ route('site.inventarisAssetTetap.index') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.inventarisAssetTetap.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="kategori_asset_id">Kategori</label>
                                <select class="form-select select2" id="kategori_asset_id" name="kategori_asset_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($kategoriAssets as $item)   
                                        <option value="{{ $item->id }}" {{ old('kategori_asset_id') == $item->id ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }}</option>
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
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="jenis_asset_id">Jenis Assets</label>
                                <select class="form-select select2" id="jenis_asset_id" name="jenis_asset_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($jenisAssets as $item)   
                                        <option value="{{ $item->id }}" {{ old('jenis_asset_id') == $item->id ? 'selected' : '' }}>{{ $item->id }}-{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            {{-- buku --}}
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="judul_buku">Judul Buku</label>
                                    <input
                                    type="text"
                                    id="judul_buku"
                                    class="form-control @error('judul_buku')
                                        is-invalid
                                    @enderror"
                                    name="judul_buku"
                                    value="{{ old('judul_buku') }}"
                                    />
                                    @error('judul_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="spesifikasi_buku">Spesifikasi Buku</label>
                                    <input
                                    type="text"
                                    id="spesifikasi_buku"
                                    class="form-control @error('spesifikasi_buku')
                                        is-invalid
                                    @enderror"
                                    name="spesifikasi_buku"
                                    value="{{ old('spesifikasi_buku') }}"
                                    />
                                    @error('spesifikasi_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- kesenian --}}
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="asal_daerah">Asal Daerah</label>
                                    <input
                                    type="text"
                                    id="asal_daerah"
                                    class="form-control @error('asal_daerah')
                                        is-invalid
                                    @enderror"
                                    name="asal_daerah"
                                    value="{{ old('asal_daerah') }}"
                                    />
                                    @error('asal_daerah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pencipta">Pencipta</label>
                                    <input
                                    type="text"
                                    id="pencipta"
                                    class="form-control @error('pencipta')
                                        is-invalid
                                    @enderror"
                                    name="pencipta"
                                    value="{{ old('pencipta') }}"
                                    />
                                    @error('pencipta')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- hewan ternak --}}
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="jenis_hewan">Jenis Hewan</label>
                                    <input
                                    type="text"
                                    id="jenis_hewan"
                                    class="form-control @error('jenis_hewan')
                                        is-invalid
                                    @enderror"
                                    name="jenis_hewan"
                                    value="{{ old('jenis_hewan') }}"
                                    />
                                    @error('jenis_hewan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="ukuran_hewan">Ukuran Hewan</label>
                                    <input
                                    type="text"
                                    id="ukuran_hewan"
                                    class="form-control @error('ukuran_hewan')
                                        is-invalid
                                    @enderror"
                                    name="ukuran_hewan"
                                    value="{{ old('ukuran_hewan') }}"
                                    />
                                    @error('ukuran_hewan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- tumbuhan --}}
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="jenis_tumbuhan">Jenis Tumbuhan</label>
                                    <input
                                    type="text"
                                    id="jenis_tumbuhan"
                                    class="form-control @error('jenis_tumbuhan')
                                        is-invalid
                                    @enderror"
                                    name="jenis_tumbuhan"
                                    value="{{ old('jenis_tumbuhan') }}"
                                    />
                                    @error('jenis_tumbuhan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="ukuran_tumbuhan">Ukuran Tumbuhan</label>
                                    <input
                                    type="text"
                                    id="ukuran_tumbuhan"
                                    class="form-control @error('ukuran_tumbuhan')
                                        is-invalid
                                    @enderror"
                                    name="ukuran_tumbuhan"
                                    value="{{ old('ukuran_tumbuhan') }}"
                                    />
                                    @error('ukuran_tumbuhan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- dynamic --}}

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

                            <div class="col-md-6 col-12">
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
                                    <label class="form-label" for="jumlah">Jumlah</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <input type="text" class="form-control @error('jumlah')
                                            is-invalid
                                        @enderror"
                                        id="jumlah"
                                        name="jumlah"
                                        value="{{ old('jumlah') }}"
                                        />
                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
