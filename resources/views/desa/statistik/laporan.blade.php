
@extends('layouts/contentLayoutMaster')

@section('title', 'Statistik Laporan Tahunan')

@section('content')
<!-- Responsive tables start -->
<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Statistik Laporan Tahunan</h4>
      </div>
        <div class="card-body border-bottom">
          <div class="row">
            <div class="col-md-4">
                <a href="{{ route('site.statistik.form.cetak.laporan', request()->tahun ? request()->tahun : \Carbon\Carbon::now()->format('Y')) }}" class="btn btn-sm btn-primary">
                    <i data-feather="printer" class="me-25"></i>
                    <span>@lang('Cetak')</span>
                </a>
            </div>
          </div>
        </div>
      <div class="card-body">
    <form class="validate-form" action="{{ route('site.statistik.laporan.penduduk') }}" method="get" enctype="multipart/form-data">

        <div class="d-inline">
        <div class="col-6">
            <input type="text" class="form-control @error('tahun')
            is-invalid
            @enderror" 
            name="tahun" 
            id="tahun" 
            value="{{ request()->tahun ? request()->tahun : \Carbon\Carbon::now()->format('Y') }}" 
            autocomplete="off"/>
            @error('tahun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-primary mt-1 me-1">@lang('Cari')</button>
        </div>
        </div>
    </form>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col" class="text-nowrap">No</th>
              <th scope="col" class="text-nowrap">Peristiwa</th>
              <th scope="col" class="text-nowrap text-center">Total</th>
              <th scope="col" class="text-nowrap text-center">Laki Laki</th>
              <th scope="col" class="text-nowrap text-center">Perempuan</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class="text-nowrap">1</td>
                <td class="text-nowrap">Penduduk Pindah</td>
                <td class="text-nowrap">{{ $pendudukPindah[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukPindah[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukPindah[0]['perempuan'] }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">2</td>
                <td class="text-nowrap">Penduduk Masuk</td>
                <td class="text-nowrap">{{ $pendudukMasuk[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukMasuk[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukMasuk[0]['perempuan'] }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">3</td>
                <td class="text-nowrap">Penduduk Lahir</td>
                <td class="text-nowrap">{{ $pendudukLahir[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukLahir[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukLahir[0]['perempuan'] }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">4</td>
                <td class="text-nowrap">Penduduk Meninggal</td>
                <td class="text-nowrap">{{ $pendudukMati[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukMati[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukMati[0]['perempuan'] }}</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Responsive tables end -->
@endsection
