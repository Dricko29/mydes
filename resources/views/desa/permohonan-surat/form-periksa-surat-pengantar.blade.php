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
                <hr>
                <div class="card-body">
                    <div class="row">
                        @if ($dokumen)
                            
                            <h4>Kelengkapan Persyaratan</h4>
                            @forelse ($dokumen as $item)
                            <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="{{asset($item)}}" alt="Card image cap" />
                            </div>
                            </div>
                            @empty

                            @endforelse                            
                        @endif

                    </div>
                    <form class="form" action="{{ route('site.surat.pengantar.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="surat" value="{{ $surat->id }}">
                            <input type="hidden" name="permohonan" value="{{ $permohonan->id }}">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                <label class="form-label" for="penduduk_id">Penduduk</label>
                                <select class="form-select select2" id="penduduk_id" name="penduduk_id" required>
                                    <option value="{{ $penduduk->id }}" selected>{{ $penduduk->nama }}</option>
                                    
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
                                <textarea class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan" rows="3">{{ old('keperluan', $permohonan->ket) }}</textarea>
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
                                <button type="button" class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#modals-slide-in">@lang('Tolak')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>