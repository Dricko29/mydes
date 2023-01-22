@extends('pages.main')

@section('css')
    
@endsection

@section('title', __('Pembangunan'.' Desa'))

@section('content')
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>@lang('Pembangunan Desa')</h1>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>@lang('Pembangunan Desa')</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="events pt-70 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($pembangunans as $item)
                    
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="events-card">
                        <img src="{{ asset($item->dokumentasiPembangunans->count() ? $item->dokumentasiPembangunans->first()->gambar : 'images/desa/pembangunan/default.jpeg') }}" alt="image" style="height: 300px"/>
                        <div class="events-card-text">
                            <ul>
                                <li>Pembangunan {{ $item->sifat == 1 ? 'Baru' : 'Lanjut'  }}</li>
                                <li>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</li>
                            </ul>
                            <h4><a href="#">{{ $item->nama }}</a></h4>
                            <p>Anggaran {{ $item->formatRupiah('anggaran') }}</p>
                            <p>
                                <i class="fas fa-map-marker-alt"></i>
                                <a href="#"
                                    >{{ $item->lokasi }}</a
                                >
                            </p>
                            {{-- <a class="read-more-btn" href="#">@lang('Read More')</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $pembangunans->links('pages.partials.paginate') }}
        </div>
    </section>
@endsection

@section('js')
    
@endsection
