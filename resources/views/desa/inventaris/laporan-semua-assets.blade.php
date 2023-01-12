
@extends('layouts/contentLayoutMaster')

@section('title', 'Laporan Semua Aset')

@section('content')
<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Semua Aset</h4>
      </div>
      <div class="card-body">
        <a href="{{ route('site.form.laporan.cetak.inventaris', 'semuaAsset') }}" class="btn btn-sm btn-primary">
            <i data-feather="printer" class="me-25"></i>
            <span>@lang('Cetak')</span>
        </a>
        {{-- <p class="card-text">
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
        </div> --}}
      </div>
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col" class="text-nowrap">No</th>
              <th scope="col" class="text-nowrap">Asal Barang</th>
              <th scope="col" class="text-nowrap">Konstruksi Berjalan</th>
              <th scope="col" class="text-nowrap">Tanah</th>
              <th scope="col" class="text-nowrap">Aset Tetap</th>
              <th scope="col" class="text-nowrap">Bangunan</th>
              <th scope="col" class="text-nowrap">Peralatan</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($assets as $item)         
              <tr>
                  <td class="text-nowrap text-center">{{ $loop->iteration }}</td>
                  <td class="text-nowrap">{{ $item->nama }}</td>
                  <td class="text-nowrap text-center">{{ $item->inventaris_konstruksi_berjalans_count }}</td>
                  <td class="text-nowrap text-center">{{ $item->inventaris_tanahs_count }}</td>
                  <td class="text-nowrap text-center">{{ $item->inventaris_asset_tetaps_count }}</td>
                  <td class="text-nowrap text-center">{{ $item->inventaris_bangunans_count }}</td>
                  <td class="text-nowrap text-center">{{ $item->inventaris_peralatans_count }}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Responsive tables end -->
@endsection
