@extends('pages.main')

@section('css')
    
@endsection

@section('title', 'Home')

@section('content')
		<section class="main-banner plr-100 bg-f9fbfe">
			<div class="banner-social-icons">
				<ul>
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
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<div class="banner-text-area banner-text-area-1">
							<h6>DISCOVER THE CITY</h6>
							<h1>Corporation Has Become A Central Element</h1>
							<p>
								Lorem ipsum dolor sit amet consectetuer adipiscing phasellus
								hendrerit lorem dolor sit amet magna nibh nec urna in nisi neque
								aliquet ve, dapibus id dolor sit amet magna aliqu amet.
							</p>
							<a class="default-button" href="about.html">Learn More</a>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="banner-img-area-1">
							<img src="assets/images/banner/banner-1-1.jpg" alt="image" />
							<a
								class="video-popup"
								href="https://www.youtube.com/watch?v=ukfISpWHVWI"
								><i class="fas fa-play"></i
							></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="services pt-100 pb-70">
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
		</section>

		<section class="we-are pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="why-we-img">
							<img src="assets/images/why-we/ww1.jpg" alt="image" />
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="why-we-text-area">
							<div class="default-section-title">
								<span>WHO WE ARE</span>
								<h3>Medzo Is An Inner Metropolitan Municipality Service</h3>
								<p>
									Lorem ipsum dolor sit amet consectetur adipiscing elit sed do
									eiusmod tempor incididunt ut labore et dolore magna aliqua
									quis ipsum suspendisse ultrices gravida risus commodo viverra
									maecenas accumsan lacus vel facilisis ipsum dolor sit amet.
								</p>
							</div>
							<div class="why-we-text-list">
								<i class="flaticon-government-building"></i>
								<h4>Our Role Is To:</h4>
								<p>
									Nulla porttitor accumsan tincidunt lorem ipsum dolor sit amet
									consectetur adipiscing elit praesent sapien massa convallis a
									pellentesque nec egestas non nisi nulla porttitor accumsan
									tincidunt.
								</p>
								<ul>
									<li>Praesent sapien massa, convallis a pellentesque nec.</li>
									<li>Nulla porttitor accumsan tincidunt.</li>
									<li>Ivamus suscipit tortor eget felis porttitor volutpat.</li>
									<li>Donec rutrum congue leo eget malesuada.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="fun-facts fun-facts-1 pt-70 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card">
							<i class="flaticon-smart-city"></i>
							<h2><span class="odometer" data-count="46712">00</span></h2>
							<p>People In The City</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card">
							<i class="flaticon-location-1"></i>
							<h2>
								<span class="odometer" data-count="22">00</span>
								<span class="sign-icon">K</span>
							</h2>
							<p>Square Of City</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card">
							<i class="flaticon-park-1"></i>
							<h2>
								<span class="odometer" data-count="300">00</span>
								<span class="sign-icon">+</span>
							</h2>
							<p>Year Of Foundation</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="fun-facts-card last-card">
							<i class="flaticon-award"></i>
							<h2>
								<span class="odometer" data-count="1000">00</span>
								<span class="sign-icon">+</span>
							</h2>
							<p>Successful Programs</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="events ptb-100">
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
		</section>

		<section class="feedback pt-100 pb-70 bg-f9fbfe">
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
		</section>

		<section class="team ptb-100">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Our City Counselor</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="row justify-content-center">
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="team-card">
								<div class="team-card-img">
									<img src="assets/images/team/t1.jpg" alt="image" />
									<div class="team-social-icons">
										<ul>
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
								</div>
								<div class="team-card-text">
									<h4>Mila Wilson</h4>
									<p>City Secratery</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="team-card">
								<div class="team-card-img">
									<img src="assets/images/team/t2.jpg" alt="image" />
									<div class="team-social-icons">
										<ul>
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
								</div>
								<div class="team-card-text">
									<h4>Bren Stork</h4>
									<p>Counsil President</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="team-card">
								<div class="team-card-img">
									<img src="assets/images/team/t3.jpg" alt="image" />
									<div class="team-social-icons">
										<ul>
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
								</div>
								<div class="team-card-text">
									<h4>Mukesh Sarkar</h4>
									<p>City Mayor</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="team-card">
								<div class="team-card-img">
									<img src="assets/images/team/t4.jpg" alt="image" />
									<div class="team-social-icons">
										<ul>
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
								</div>
								<div class="team-card-text">
									<h4>David Jon</h4>
									<p>Assistant Mayor</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="precess pb-100 mt-10">
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
		</section>

		<section class="blog ptb-100 bg-f9fbfe">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Latest News & Updates</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p>
				</div>
				<div class="section-content">
					<div class="row justify-content-center">
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="blog-card">
								<div class="blog-card-img">
									<a href="blog-details.html"
										><img src="assets/images/blog/b1.jpg" alt="image"
									/></a>
								</div>
								<div class="blog-card-text-area">
									<div class="blog-date">
										<ul>
											<li>
												<i class="fas fa-user"></i> By
												<a href="posted-by.html">Admin</a>
											</li>
											<li><i class="far fa-comments"></i> No Comment</li>
											<li><i class="far fa-calendar-alt"></i> 01 Nov 2022</li>
										</ul>
									</div>
									<h4>
										<a href="blog-details.html">Responds To Citizens Advice</a>
									</h4>
									<p>
										Lorem ipsum dolor amet magna set dolor sit amet consectetur
										adipiscing do elite labore.
									</p>
									<a class="read-more-btn" href="blog-details.html"
										>Read More</a
									>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="blog-card">
								<div class="blog-card-img">
									<a href="blog-details.html"
										><img src="assets/images/blog/b2.jpg" alt="image"
									/></a>
								</div>
								<div class="blog-card-text-area">
									<div class="blog-date">
										<ul>
											<li>
												<i class="fas fa-user"></i> By
												<a href="posted-by.html">Admin</a>
											</li>
											<li><i class="far fa-comments"></i> No Comment</li>
											<li><i class="far fa-calendar-alt"></i> 02 Nov 2022</li>
										</ul>
									</div>
									<h4>
										<a href="blog-details.html">Housing Advisers Program</a>
									</h4>
									<p>
										Lorem ipsum dolor amet magna set dolor sit amet consectetur
										adipiscing do elite labore.
									</p>
									<a class="read-more-btn" href="blog-details.html"
										>Read More</a
									>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="blog-card">
								<div class="blog-card-img">
									<a href="blog-details.html"
										><img src="assets/images/blog/b3.jpg" alt="image"
									/></a>
								</div>
								<div class="blog-card-text-area">
									<div class="blog-date">
										<ul>
											<li>
												<i class="fas fa-user"></i> By
												<a href="posted-by.html">Admin</a>
											</li>
											<li><i class="far fa-comments"></i> No Comment</li>
											<li><i class="far fa-calendar-alt"></i> 03 Nov 2022</li>
										</ul>
									</div>
									<h4>
										<a href="blog-details.html">Respond To National Report</a>
									</h4>
									<p>
										Lorem ipsum dolor amet magna set dolor sit amet consectetur
										adipiscing do elite labore.
									</p>
									<a class="read-more-btn" href="blog-details.html"
										>Read More</a
									>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection

@section('js')
    
@endsection