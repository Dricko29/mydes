@extends('pages.main')

@section('css')
<style>
	.home-banner {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  /* background-image: url("../images/desa/banner/default-banner.jpg"); */
  background-image: url({{ Storage::disk('public')->url(settings()->group('umum')->get('app_banner')) }});
  position: relative;
}

.home-banner::before {
  content: '';
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  position: absolute;
  left: 0;
  top: 0;
  z-index: 0;
}
</style>
@endsection

@section('title', 'Home')

@section('content')
		<section class="home-banner">
			<div class="container">
				<div class="uni-banner-text-area">
					<ul>
						<li><img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_logo')) }}" alt=""></li>
					</ul>
					<h1 class="mt-4">@lang('Welcome to') Website Pemerintahan Desa {{ Str::ucFirst(settings()->group('desa')->get('nama_desa')) }}</h1>
				</div>
			</div>
		</section>

		@include('pages.home.blog')
		
		{{-- <section class="services pt-100 pb-70">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Find Government Services</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="service-slider-area-1 owl-carousel">
						<div class="service-card mlr-15 mb-30">
							<div class="service-card-img">
								<a href="service-detaisl.html"
									><img src="assets/images/service/s1.jpg" alt="image"
								/></a>
								<i class="flaticon-balance"></i>
							</div>
							<div class="service-card-text">
								<h4><a href="service-details.html">Salty And The Law</a></h4>
								<p>
									Lorem ipsum dolor amet magna set dolor sit amet consectetur
									adipiscing do elite labore.
								</p>
								<a class="read-more-btn" href="service-details.html"
									>Read More</a
								>
							</div>
						</div>
						<div class="service-card mlr-15 mb-30">
							<div class="service-card-img">
								<a href="service-detaisl.html"
									><img src="assets/images/service/s2.jpg" alt="image"
								/></a>
								<i class="flaticon-delivery"></i>
							</div>
							<div class="service-card-text">
								<h4><a href="service-details.html">Travel & Immigration</a></h4>
								<p>
									Lorem ipsum dolor amet magna set dolor sit amet consectetur
									adipiscing do elite labore.
								</p>
								<a class="read-more-btn" href="service-details.html"
									>Read More</a
								>
							</div>
						</div>
						<div class="service-card mlr-15 mb-30">
							<div class="service-card-img">
								<a href="service-detaisl.html"
									><img src="assets/images/service/s3.jpg" alt="image"
								/></a>
								<i class="flaticon-portfolio"></i>
							</div>
							<div class="service-card-text">
								<h4><a href="service-details.html">Business Services</a></h4>
								<p>
									Lorem ipsum dolor amet magna set dolor sit amet consectetur
									adipiscing do elite labore.
								</p>
								<a class="read-more-btn" href="service-details.html"
									>Read More</a
								>
							</div>
						</div>
						<div class="service-card mlr-15 mb-30">
							<div class="service-card-img">
								<a href="service-detaisl.html"
									><img src="assets/images/service/s4.jpg" alt="image"
								/></a>
								<i class="flaticon-smart-city"></i>
							</div>
							<div class="service-card-text">
								<h4><a href="service-details.html">Business Strategy</a></h4>
								<p>
									Lorem ipsum dolor amet magna set dolor sit amet consectetur
									adipiscing do elite labore.
								</p>
								<a class="read-more-btn" href="service-details.html"
									>Read More</a
								>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}

		<section class="we-are pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="">
							<img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_banner')) }}" alt="image" style="height: 620px"/>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="why-we-text-area">
							<div class="default-section-title">
								<span>Desa</span>
								<h3>Visi</h3>
								<p>
									{{ settings()->group('desa')->get('visi') }}
								</p>
							</div>
							<div class="why-we-text-list">
								<i class="flaticon-government-building"></i>
								<h4>Misi:</h4>
								{{-- <p>
									Nulla porttitor accumsan tincidunt lorem ipsum dolor sit amet
									consectetur adipiscing elit praesent sapien massa convallis a
									pellentesque nec egestas non nisi nulla porttitor accumsan
									tincidunt.
								</p> --}}
								<ul>
									@foreach ($misi as $misi)	
									<li>{{ $misi->item }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- info penduduk --}}
		<section class="fun-facts fun-facts-1 pt-70 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card">
							<i class="fas fa-user"></i>
							<h2><span class="odometer" data-count="{{ $jmlPenduduk }}">00</span></h2>
							<p>Jumlah Penduduk</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card">
							<i class="fas fa-users"></i>
							<h2>
								<span class="odometer" data-count="{{ $jmlKeluarga }}">00</span>
							</h2>
							<p>Jumlah Keluarga</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card">
							<i class="fas fa-male"></i>
							<h2>
								<span class="odometer" data-count="{{ $jmlPendudukLaki }}">00</span>
							</h2>
							<p>Jumlah Penduduk Laki-Laki</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card last-card">
							<i class="fas fa-female"></i>
							<h2>
								<span class="odometer" data-count="{{ $jmlPendudukPerempuan }}">00</span>
							</h2>
							<p>Jumlah Penduduk Perempuan</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- <section class="events ptb-100">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Upcoming City Events</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="events-slider-area owl-carousel">
						<div class="events-card">
							<img src="assets/images/events/e1.jpg" alt="image" />
							<div class="events-card-text">
								<ul>
									<li>Conference</li>
									<li>Oct 12, 2022</li>
								</ul>
								<h4><a href="event-details.html">Annual Conference 2022</a></h4>
								<p>
									<i class="fas fa-map-marker-alt"></i>
									<a href="https://goo.gl/maps/QTg39qSWoB5fdndT7"
										>At City Center, 27 Division Street, USA</a
									>
								</p>
								<a class="read-more-btn" href="event-details.html">Read More</a>
							</div>
						</div>
						<div class="events-card">
							<img src="assets/images/events/e2.jpg" alt="image" />
							<div class="events-card-text">
								<ul>
									<li>Conference</li>
									<li>Oct 13, 2022</li>
								</ul>
								<h4>
									<a href="event-details.html">Negotiation In Government</a>
								</h4>
								<p>
									<i class="fas fa-map-marker-alt"></i>
									<a href="https://goo.gl/maps/QTg39qSWoB5fdndT7"
										>At City Center, 27 Division Street, USA</a
									>
								</p>
								<a class="read-more-btn" href="event-details.html">Read More</a>
							</div>
						</div>
						<div class="events-card">
							<img src="assets/images/events/e3.jpg" alt="image" />
							<div class="events-card-text">
								<ul>
									<li>Conference</li>
									<li>Oct 14, 2022</li>
								</ul>
								<h4>
									<a href="event-details.html">Annual Health Conference</a>
								</h4>
								<p>
									<i class="fas fa-map-marker-alt"></i>
									<a href="https://goo.gl/maps/QTg39qSWoB5fdndT7"
										>At City Center, 27 Division Street, USA</a
									>
								</p>
								<a class="read-more-btn" href="event-details.html">Read More</a>
							</div>
						</div>
						<div class="events-card">
							<img src="assets/images/events/e4.jpg" alt="image" />
							<div class="events-card-text">
								<ul>
									<li>Conference</li>
									<li>Oct 15, 2022</li>
								</ul>
								<h4><a href="event-details.html">Annual Conference 2022</a></h4>
								<p>
									<i class="fas fa-map-marker-alt"></i>
									<a href="https://goo.gl/maps/QTg39qSWoB5fdndT7"
										>At City Center, 27 Division Street, USA</a
									>
								</p>
								<a class="read-more-btn" href="event-details.html">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="explore-event explore-event-1 pb-100">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Explore City Events</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="explore-events-text-area">
								<div class="default-section-title">
									<h3>
										Plan A Great City That Provides The Essence Of Success
									</h3>
									<p>
										Lorem ipsum dolor sit amet consectetur adipiscing elit sed
										do eiusmod tempor incididunt ut labore et dolore magna
										aliqua quis ipsum suspendisse ultrices gravida risus commodo
										viverra maecenas accumsan lacus vel facilisis ipsum dolor
										sit amet.
									</p>
								</div>
								<div class="explore-events-text-list">
									<i class="flaticon-government"></i>
									<h4>Sustainable Innovation Is Our Pathway:</h4>
									<p>
										Nulla porttitor accumsan tincidunt lorem ipsum dolor sit
										amet consectetur adipiscing elit praesent sapien massa
										convallis a pellentesque nec egestas non nisi nulla
										porttitor accumsan tincidunt.
									</p>
									<ul>
										<li>
											Praesent sapien massa, convallis a pellentesque nec.
										</li>
										<li>Nulla porttitor accumsan tincidunt.</li>
										<li>
											Ivamus suscipit tortor eget felis porttitor volutpat.
										</li>
										<li>Donec rutrum congue leo eget malesuada.</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="explore-events-img">
								<img src="assets/images/why-we/ww2.jpg" alt="image" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}

		{{-- pegawai --}}
		{{-- <section class="feedback pt-100 pb-70 bg-f9fbfe">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>What Your Counselors Says</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="feedback-slider-area owl-carousel">
						<div class="feedback-card mlr-15 mb-30">
							<i class="flaticon-quotation"></i>
							<div class="stars">
								<ul>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
								</ul>
							</div>
							<p>
								“Lorem ipsum dolor sit amet, consectetur adipiscing elitsed
								eiusmod tempor elite incididunt labore dolore magna aliqua Quis
								ipsum suspendisse ultrices set amet set do eimusd tempor labore
								sit dolor magna aliiqua amet.”
							</p>
							<div class="feedback-intro-area">
								<img src="assets/images/feedback/f1.jpg" alt="image" />
								<div class="feedback-intro">
									<h5>Jhon Abraham</h5>
									<span>City Council President</span>
								</div>
							</div>
						</div>
						<div class="feedback-card mlr-15 mb-30">
							<i class="flaticon-quotation"></i>
							<div class="stars">
								<ul>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
								</ul>
							</div>
							<p>
								“Lorem ipsum dolor sit amet, consectetur adipiscing elitsed
								eiusmod tempor elite incididunt labore dolore magna aliqua Quis
								ipsum suspendisse ultrices set amet set do eimusd tempor labore
								sit dolor magna aliiqua amet.”
							</p>
							<div class="feedback-intro-area">
								<img src="assets/images/feedback/f2.jpg" alt="image" />
								<div class="feedback-intro">
									<h5>Jhon Smith</h5>
									<span>City Council Advisor</span>
								</div>
							</div>
						</div>
						<div class="feedback-card mlr-15 mb-30">
							<i class="flaticon-quotation"></i>
							<div class="stars">
								<ul>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
									<li><i class="fas fa-star"></i></li>
								</ul>
							</div>
							<p>
								“Lorem ipsum dolor sit amet, consectetur adipiscing elitsed
								eiusmod tempor elite incididunt labore dolore magna aliqua Quis
								ipsum suspendisse ultrices set amet set do eimusd tempor labore
								sit dolor magna aliiqua amet.”
							</p>
							<div class="feedback-intro-area">
								<img src="assets/images/feedback/f3.jpg" alt="image" />
								<div class="feedback-intro">
									<h5>Peter Smith</h5>
									<span>City Council Secratery</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}

		@include('pages.home.pegawai')

		{{-- <section class="precess pb-100 mt-10">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Tackling The Process</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="row justify-content-center">
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="process-card">
								<i class="flaticon-google-docs"></i>
								<h4><a href="about.html">Application</a></h4>
								<p>
									There are many variations of passages of the lorem Ipsum
									available but this is a majority have suffered.
								</p>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="process-card">
								<i class="flaticon-process"></i>
								<h4><a href="about.html">Processing</a></h4>
								<p>
									There are many variations of passages of the lorem Ipsum
									available but this is a majority have suffered.
								</p>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="process-card">
								<i class="flaticon-checked-1"></i>
								<h4><a href="about.html">Complete</a></h4>
								<p>
									There are many variations of passages of the lorem Ipsum
									available but this is a majority have suffered.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
@endsection

@section('js')
    
@endsection