@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Inventaris Peralatan Dan Mesin')

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
                    <h4 class="card-title">Data Inventaris Peralatan Dan Mesin</h4>
                    <a href="{{ route('site.inventarisPeralatan.index') }}" class="btn btn-primary">@lang('Back')</a>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('site.inventarisPeralatan.update', $inventarisPeralatan) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="kategori_peralatan_id">Kategori</label>
                                <select class="form-select select2" id="kategori_peralatan_id" name="kategori_peralatan_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($kategoriPermes as $item)   
                                        <option value="{{ $item->id }}" {{ old('kategori_peralatan_id', $inventarisPeralatan->kategori_peralatan_id) == $item->id ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }}</option>
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
                                    placeholder="{{ $inventarisPeralatan->nama }}"
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
                                    placeholder="{{ $inventarisPeralatan->kode }}"
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
                                    placeholder="{{ $inventarisPeralatan->no_register }}"
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
                                    <label class="form-label" for="merk">Merk/Type</label>
                                    <input
                                    type="text"
                                    id="merk"
                                    class="form-control @error('merk')
                                        is-invalid
                                    @enderror"
                                    name="merk"
                                    value="{{ old('merk', $inventarisPeralatan->merk) }}"
                                    />
                                    @error('merk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="ukuran">Ukuran (cc)</label>
                                    <input
                                    type="text"
                                    id="ukuran"
                                    class="form-control @error('ukuran')
                                        is-invalid
                                    @enderror"
                                    name="ukuran"
                                    value="{{ old('ukuran',$inventarisPeralatan->ukuran) }}"
                                    />
                                    @error('ukuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="bahan">Bahan</label>
                                    <input
                                    type="text"
                                    id="bahan"
                                    class="form-control @error('bahan')
                                        is-invalid
                                    @enderror"
                                    name="bahan"
                                    value="{{ old('bahan',$inventarisPeralatan->bahan) }}"
                                    />
                                    @error('bahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_pabrik">No Pabrik</label>
                                    <input
                                    type="text"
                                    id="no_pabrik"
                                    class="form-control @error('no_pabrik')
                                        is-invalid
                                    @enderror"
                                    name="no_pabrik"
                                    value="{{ old('no_pabrik',$inventarisPeralatan->no_pabrik) }}"
                                    />
                                    @error('no_pabrik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_mesin">No Mesin</label>
                                    <input
                                    type="text"
                                    id="no_mesin"
                                    class="form-control @error('no_mesin')
                                        is-invalid
                                    @enderror"
                                    name="no_mesin"
                                    value="{{ old('no_mesin',$inventarisPeralatan->no_mesin) }}"
                                    />
                                    @error('no_mesin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_rangka">No Rangka</label>
                                    <input
                                    type="text"
                                    id="no_rangka"
                                    class="form-control @error('no_rangka')
                                        is-invalid
                                    @enderror"
                                    name="no_rangka"
                                    value="{{ old('no_rangka',$inventarisPeralatan->no_rangka) }}"
                                    />
                                    @error('no_rangka')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="no_polisi">No Polisi</label>
                                    <input
                                    type="text"
                                    id="no_polisi"
                                    class="form-control @error('no_polisi')
                                        is-invalid
                                    @enderror"
                                    name="no_polisi"
                                    value="{{ old('no_polisi',$inventarisPeralatan->no_polisi) }}"
                                    />
                                    @error('no_polisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="bpkb">BPKB</label>
                                    <input
                                    type="text"
                                    id="bpkb"
                                    class="form-control @error('bpkb')
                                        is-invalid
                                    @enderror"
                                    name="bpkb"
                                    value="{{ old('bpkb',$inventarisPeralatan->bpkb) }}"
                                    />
                                    @error('bpkb')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                    value="{{ old('tahun',$inventarisPeralatan->tahun) }}"
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
                                <label class="form-label" for="pengguna_barang_id">Pengguna Barang</label>
                                <select class="form-select select2" id="pengguna_barang_id" name="pengguna_barang_id" required>
                                    <option value="">Pilih</option>
                                    @foreach ($penggunaBarang as $item)   
                                        <option value="{{ $item->id }}" {{ old('pengguna_barang_id',$inventarisPeralatan->pengguna_barang_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
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
                                        <option value="{{ $item->id }}" {{ old('asal_id',$inventarisPeralatan->asal_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
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
                                        value="{{ old('harga', $inventarisPeralatan->harga) }}"
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
                                    @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan',$inventarisPeralatan->keterangan) }}</textarea>
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
