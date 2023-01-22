
@extends('layouts/contentLayoutMaster')

@section('title', 'Laporan Semua Aset')

@section('content')
<!-- Responsive tables start -->
<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Statistik Pendidikan Penduduk</h4>
      </div>
        <div class="card-body border-bottom">
          <div class="row">
            <div class="col-md-4">
                <a href="{{ route('site.statistik.form.cetak', 'pendidikan') }}" class="btn btn-sm btn-primary">
                    <i data-feather="printer" class="me-25"></i>
                    <span>@lang('Cetak')</span>
                </a>
            </div>
          </div>
        </div>
      {{-- <div class="card-body">
        <p class="card-text">
          Responsive tables allow tables to be scrolled horizontally with ease. Make any table responsive across all
          viewports by adding <code class="highlighter-rouge">.table-responsive</code> class on
          <code class="highlighter-rouge">.table</code>. Or, pick a maximum breakpoint with which to have a responsive
          table up to by adding <code class="highlighter-rouge"> .table-responsive{-sm|-md|-lg|-xl}</code>. Read full
          documentation
          <a href="https://getbootstrap.com/docs/4.3/content/tables/#responsive-tables" target="_blank">here.</a>
        </p>
        <div class="alert alert-info">
          <div class="alert-body">
            <h4 class="text-warning">Vertical clipping/truncation</h4>
            <p>
              Responsive tables make use of <code class="highlighter-rouge">overflow-y: hidden</code>, which clips off
              any content that goes beyond the bottom or top edges of the table. In particular, this can clip off
              dropdown menus and other third-party widgets.
            </p>
          </div>
        </div>
      </div> --}}
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col" class="text-nowrap">No</th>
              <th scope="col" class="text-nowrap">Pendidikan</th>
              <th scope="col" class="text-nowrap text-center" colspan="2">Penduduk Laki Laki</th>
              <th scope="col" class="text-nowrap text-center" colspan="2">Penduduk Perempuan</th>
              <th scope="col" class="text-nowrap text-center" colspan="2">Penduduk Perempuan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pendidikan as $item)           
            <tr>
              <td class="text-nowrap">{{ $loop->iteration }}</td>
              <td class="text-nowrap">{{ $item->nama }}</td>
              <td class="text-nowrap">{{ $item->penduduk_count }}</td>
              @if ($item->penduduk_count !=0)
                  
              <td class="text-nowrap">{{ number_format((($item->penduduk_count/$pendudukTotal) * 100), 2) }}%</td>
              @else
                <td>0%</td>
              @endif
              <td class="text-nowrap">{{ $item->laki }}</td>
              @if ($item->laki !=0)
                  
              <td class="text-nowrap">{{ number_format((($item->laki/$item->penduduk_count) * 100), 2) }}%</td>
              @else
                <td>0%</td>
              @endif
              <td class="text-nowrap">{{ $item->perempuan }}</td>
                @if ($item->laki !=0)
                  
                <td class="text-nowrap">{{ number_format((($item->perempuan/$item->penduduk_count) * 100), 2) }}%</td>
                @else
                <td>0%</td>
                @endif
            </tr>
            @endforeach
            <tr>
              <td colspan="2">Total</td>
              <td>{{ $pendidikan->sum('penduduk_count')}}</td>
              <td>{{ number_format(($pendidikan->sum('penduduk_count')/$pendudukTotal)*100),2}}%</td>
              <td>{{ $pendidikan->sum('laki')}}</td>
              <td>{{ number_format(($pendidikan->sum('laki')/$pendudukTotal)*100),2}}%</td>
              <td>{{ $pendidikan->sum('perempuan')}}</td>
              <td>{{ number_format(($pendidikan->sum('perempuan')/$pendudukTotal)*100),2}}%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Responsive tables end -->
@endsection
