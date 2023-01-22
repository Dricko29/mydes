
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard User')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-12 col-md-12 col-12">
      <div class="card card-congratulation-medal">
        <div class="card-body">
          <h5>Selamat Datang {{ Auth::user()->name }}!</h5>
        </div>
      </div>
    </div>
    <!--/ Medal Card -->
</section>
<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      {{-- <div class="card-header">
          <h4 class="card-title">Biodata</h4>
      </div>
      <div class="card-body">

      </div> --}}
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Info Akun</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Email</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ Auth::user()->email }}</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Diri</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nama</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->nama }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">NIK</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->nik }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Keluarga</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->keluarga ? $layanan->penduduk->keluarga->no_keluarga : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor KK Sebelumnya</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_keluarga_sebelumnya }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Hubungan Dalam Keluarga</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrHubungan ? $layanan->penduduk->attrHubungan->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Jenis Kelamin</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrKelamin ? $layanan->penduduk->attrKelamin->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Agama</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrAgama ? $layanan->penduduk->attrAgama->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Status</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrStatus ? $layanan->penduduk->attrStatus->nama : '-' }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  {{-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> --}}
@endsection
