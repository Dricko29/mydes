@extends('pages.main')

@section('css')
    
@endsection

@section('title', __('Complaint'))

@section('content')
		<section class="uni-banner">
			<div class="container">
				<div class="uni-banner-text-area">
					<h1>@lang('Complaint')</h1>
					<ul>
						<li><a href="/">Home</a></li>
						<li>List @lang('Complaint')</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="blog-details pt-70 pb-100">
			<div class="container">
				<div class="row">
					@foreach ($pengaduans as $pengaduan)					
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="blog-card">
							<div class="blog-card-img">
								<a href="#"
									><img src="{{ $pengaduan->foto ? Storage::disk('public')->url($pengaduan->foto) : asset('images/desa/pengaduan/default.jpeg') }}" alt="image"
								/></a>
							</div>
							<div class="blog-card-text-area">
								<div class="blog-date">
									<ul>
										<li>
											<i class="fas fa-user"></i> @lang('By')
											<a href="#">{{ Str::ucfirst($pengaduan->nama) }}</a>
										</li>
										<li><i class="far fa-comments"></i> {{ $pengaduan->tanggapanPengaduans->count() }} Tanggapan</li>
										<li><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M Y') }}</li>
										<li>
											@if ($pengaduan->status == 2)
											<span class="badge bg-success">Sudah Diproses</span> 
											@elseif ($pengaduan->status == 1)												
											<span class="badge bg-warning">Sedang Diproses</span> 
											@else
											<span class="badge bg-danger">Menunggu Diproses</span> 
											@endif
										</li>
									</ul>
								</div>
								<h4>
									<a href="#">{{ $pengaduan->judul }}</a>
								</h4>
								<p>
									{{Str::limit($pengaduan->isi, 100, '...')}}
								</p>
								<a class="read-more-btn" href="{{ route('detail.pengaduan', $pengaduan->id) }}">@lang('Read More')</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				{{ $pengaduans->links('pages.partials.paginate') }}
				{{-- <div class="paginations mt-30">
					<ul>
						<li><a class="active" href="blog.html">1</a></li>
						<li><a href="blog.html">2</a></li>
						<li><a href="blog.html">3</a></li>
						<li>
							<a href="blog.html"><i class="fas fa-chevron-right"></i></a>
						</li>
					</ul>
				</div> --}}
			</div>
		</section>		
@endsection

@section('js')
    
@endsection
