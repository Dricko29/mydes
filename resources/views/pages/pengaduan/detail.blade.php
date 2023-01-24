@extends('pages.main')

@section('css')
    
@endsection

@section('title', 'Detail '.__('Complaint'))

@section('content')
		<section class="uni-banner">
			<div class="container">
				<div class="uni-banner-text-area">
					<h1>Detail @lang('Complaint')</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="{{ route('list.pengaduan') }}">@lang('Complaint')</a></li>
						<li>Detail</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="blog-details ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="blog-details-text-area details-text-area">
							<img src="{{ $pengaduan->foto ? Storage::disk('public')->url($pengaduan->foto) : asset('images/desa/pengaduan/default.jpeg') }}" alt="image" />
							<div class="blog-date">
								<ul>
									<li>
										<i class="fas fa-user"></i> @lang('By')
										<a href="posted-by.html">{{ Str::ucFirst($pengaduan->nama) }}</a>
									</li>
									<li><i class="far fa-comments"></i> {{ $pengaduan->tanggapanPengaduans->count() }} Tanggapan</li>
									<li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M Y') }}</li>
								</ul>
							</div>
							<h3 class="mt-0">{{ $pengaduan->judul }}</h3>
							<p>
								{!! $pengaduan->isi !!}
							</p>
						</div>
						{{-- <div class="blog-text-footer mt-30">
							<div class="tag-area">
								<ul>
									<li><i class="fas fa-tags"></i></li>
									<li><a href="category.html">Culture,</a></li>
									<li><a href="category.html">Business,</a></li>
									<li><a href="category.html">Citizen</a></li>
								</ul>
							</div>
							<div class="social-icons">
								<ul>
									<li><span>Share:</span></li>
									<li>
										<a href="https://www.facebook.com/" target="_blank"
											><i class="fab fa-facebook-f"></i
										></a>
									</li>
									<li>
										<a href="https://www.linkedin.com/" target="_blank"
											><i class="fab fa-linkedin-in"></i
										></a>
									</li>
									<li>
										<a href="https://twitter.com/" target="_blank"
											><i class="fab fa-twitter"></i
										></a>
									</li>
									<li>
										<a href="https://www.instagram.com/" target="_blank"
											><i class="fab fa-instagram"></i
										></a>
									</li>
								</ul>
							</div>
						</div> --}}
						<div class="bd-comments details-text-area">
							<h3>Tanggapan</h3>
							@foreach ($pengaduan->tanggapanPengaduans as $tanggapan)
								
							<div class="comment-card">
								<img src="{{ asset(App\Models\User::find($tanggapan->created_by)->profile_photo_url) }}" alt="image" style="height: 80px"/>
								<h5>{{ App\Models\User::find($tanggapan->created_by)->name }}</h5>
								<p>
									{{ $tanggapan->respon }}
								</p>
								{{-- <a href="#bd-form">Reply</a> --}}
							</div>
							@endforeach
						</div>
						{{-- <div class="bd-form details-text-area" id="bd-form">
							<h3>Leave A Reply</h3>
							<p>
								Your email address will not be published. Required fields are
								marked*
							</p>
							<form>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-12">
										<input
											type="text"
											class="form-control"
											placeholder="Name*"
											required
										/>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<input
											type="email"
											class="form-control"
											placeholder="Email*"
											required
										/>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<input
											type="text"
											class="form-control"
											placeholder="Phone*"
											required
										/>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<input
											type="text"
											class="form-control"
											placeholder="Subject*"
											required
										/>
									</div>
									<div class="col-md-12">
										<textarea
											rows="5"
											class="form-control"
											placeholder="Message*"
											required
										></textarea>
									</div>
									<div class="col-md-12">
										<button class="default-button" type="submit">
											Post A Comment
										</button>
									</div>
								</div>
							</form>
						</div> --}}
					</div>
				</div>
			</div>
		</section>
@endsection

@section('js')
    
@endsection
