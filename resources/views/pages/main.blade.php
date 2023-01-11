<!DOCTYPE html>
<html lang="zxx">
	<!-- Mirrored from templates.hibootstrap.com/medzo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 08:37:43 GMT -->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="assets/css/animate.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/fontawsome.min.css" />
		<link rel="stylesheet" href="assets/fonts/flaticon.css" />
		<link rel="stylesheet" href="assets/css/meanmenu.min.css" />
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" href="assets/css/nice-select.min.css" />
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
		<link rel="stylesheet" href="assets/css/magnific-popup.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/odometer.min.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/responsive.css" />
		<title>{{ settings()->group('umum')->get('app_nama', 'MyDes') }} - @yield('title')</title>
		<link rel="icon" type="image/png" href="{{ asset(settings()->group('umum')->get('app_logo', 'assets/images/fav-icon.png')) }}" />
	</head>
	<body>
        @include('pages.top-bar')

		<div class="navbar-area">
			<div class="main-responsive-nav">
				<div class="container-fluid plr-100">
					<div class="mobile-nav">
						<a href="/" class="logo"
							><img src="{{ settings()->group('umum')->get('app_logo', 'assets/images/small-logo.png') }}" alt="logo" style="height: 40px"/>
                        </a>
						<ul class="menu-sidebar menu-small-device">
							<li>
								<button class="popup-button">
									<i class="fas fa-search"></i>
								</button>
							</li>
							<li>
								<a class="default-button" href="contact.html"
									>Get A Quote <i class="fas fa-angle-right"></i
								></a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="main-nav plr-100">
				<div class="container-fluid">
					<nav class="navbar navbar-expand-md navbar-light">
						<a class="navbar-brand" href="/">
							<img src="{{ settings()->group('umum')->get('app_logo', 'assets/images/logo.png') }}" alt="logo" style="height: 50px"/>
						</a>
						<div
							class="collapse navbar-collapse mean-menu"
							id="navbarSupportedContent"
						>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="#" class="nav-link dropdown-toggle active">Home</a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="index.html" class="nav-link active"
												>Home Page 1</a
											>
										</li>
										<li class="nav-item">
											<a href="index-2.html" class="nav-link">Home Page 2</a>
										</li>
										<li class="nav-item">
											<a href="index-3.html" class="nav-link">Home Page 3</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link dropdown-toggle">Projects</a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="projects.html" class="nav-link">Our Projects</a>
										</li>
										<li class="nav-item">
											<a href="project-details.html" class="nav-link"
												>Project Details</a
											>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link dropdown-toggle">Services</a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="services.html" class="nav-link">Our Services</a>
										</li>
										<li class="nav-item">
											<a href="service-details.html" class="nav-link"
												>Service Details</a
											>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link dropdown-toggle">Pages </a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="about.html" class="nav-link">About Us</a>
										</li>
										<li class="nav-item">
											<a href="faq.html" class="nav-link">FAQ</a>
										</li>
										<li class="nav-item">
											<a href="councilor.html" class="nav-link"
												>Our Councillors</a
											>
										</li>
										<li class="nav-item">
											<a href="events.html" class="nav-link">Our Events</a>
										</li>
										<li class="nav-item">
											<a href="event-details.html" class="nav-link"
												>Event Details</a
											>
										</li>
										<li class="nav-item">
											<a href="category.html" class="nav-link">Categories</a>
										</li>
										<li class="nav-item">
											<a href="profile-authentication.html" class="nav-link"
												>My Account</a
											>
										</li>
										<li class="nav-item">
											<a href="testimonial.html" class="nav-link"
												>Testimonials</a
											>
										</li>
										<li class="nav-item">
											<a href="error.html" class="nav-link">404 Error Page</a>
										</li>
										<li class="nav-item">
											<a href="privacy.html" class="nav-link">Privacy Policy</a>
										</li>
										<li class="nav-item">
											<a href="terms.html" class="nav-link"
												>Terms & Conditions</a
											>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link dropdown-toggle">Blog </a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="blog.html" class="nav-link">Blog Grid</a>
										</li>
										<li class="nav-item">
											<a href="blog-left-sidebar.html" class="nav-link"
												>Blog Left Sidebar</a
											>
										</li>
										<li class="nav-item">
											<a href="blog-right-sidebar.html" class="nav-link"
												>Blog Right Sidebar</a
											>
										</li>
										<li class="nav-item">
											<a href="blog-details.html" class="nav-link"
												>Blog Details</a
											>
										</li>
										<li class="nav-item">
											<a href="posted-by.html" class="nav-link">Blog Post</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="contact.html" class="nav-link">Contact Us</a>
								</li>
							</ul>
							<div class="menu-sidebar">
								<ul>
									<li>
										<button class="popup-button">
											<i class="fas fa-search"></i>
										</button>
									</li>
									<li>
										<a class="default-button" href="contact.html"
											>Get in Touch</a
										>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>

        @yield('content')

		<section class="footer">
			<div class="container">
				<div class="footer-content ptb-100">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="footer-logo-area">
								<a href="index.html"
									><img src="assets/images/white-logo.png" alt="image"
								/></a>
								<p>
									Lorem ipsum dolor sit amet, consec tetur adipiscing elit
									tempor incididunt labore dolore magna aliqua consec tetur
									adipiscing elite sed do labor.
								</p>
								<div class="footer-social-area">
									<ul>
										<li><span>Follow Us: </span></li>
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
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="footer-links footer-contact">
								<h3>Get In Touch</h3>
								<div class="footer-contact-card">
									<i class="fas fa-map-marker-alt"></i>
									<h5>Location:</h5>
									<p>
										<a
											href="https://goo.gl/maps/bc3qza49szqGNZt86"
											target="_blank"
											>2976 sunrise road las vegas</a
										>
									</p>
								</div>
								<div class="footer-contact-card">
									<i class="fas fa-envelope"></i>
									<h5>Email:</h5>
									<p>
										<a
											href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#a5d6d0d5d5cad7d1e5c8c0c1dfca8bc6cac8"
											><span
												class="__cf_email__"
												data-cfemail="95e6e0e5e5fae7e1d5f8f0f1effabbf6faf8"
												>[email&#160;protected]</span
											></a
										>
									</p>
								</div>
								<div class="footer-contact-card">
									<i class="fas fa-phone-alt"></i>
									<h5>Location:</h5>
									<p><a href="tel:+13454567877">+1-3454-5678-77</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="footer-links footer-quick-links">
								<h3>Quick Links</h3>
								<ul>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="services.html">Government Service</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="tetrms.html">Terms & Conditions</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="privacy.html">Privacy Policies</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="privacy.html">Accessibilty</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="events.html">Recent Events</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="footer-links footer-newsletter">
								<h3>Subscribe</h3>
								<p>Subscribe To Our Newsletter To Get Our Update News!</p>
								<form class="newsletter-form" data-toggle="validator">
									<input
										type="email"
										class="input-newsletter form-control"
										placeholder="Your Email"
										name="EMAIL"
										required
										autocomplete="off"
									/>
									<button class="default-button news-btn">Subscribe Now</button>
									<div id="validator-newsletter" class="form-result"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<p>
						© <strong>Medzo</strong> All Rights Reserved By
						<a target="_blank" href="https://hibootstrap.com/">HiBootstrap</a>
					</p>
				</div>
			</div>
		</section>

		<div class="popup">
			<div class="popup-content">
				<button class="close-btn" id="popup-close">
					<i class="fas fa-times"></i>
				</button>
				<form>
					<div class="input-group search-box">
						<input type="text" class="form-control" placeholder="Search" />
						<button class="btn" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>

		<div class="go-top"><i class="fas fa-chevron-up"></i></div>

		<script
			data-cfasync="false"
			src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
		></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/meanmenu.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/magnific-popup.min.js"></script>
		<script src="assets/js/TweenMax.js"></script>
		<script src="assets/js/nice-select.min.js"></script>
		<script src="assets/js/form-validator.min.js"></script>
		<script src="assets/js/contact-form-script.js"></script>
		<script src="assets/js/ajaxchimp.min.js"></script>
		<script src="assets/js/owl.carousel2.thumbs.min.js"></script>
		<script src="assets/js/appear.min.js"></script>
		<script src="assets/js/odometer.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>

	<!-- Mirrored from templates.hibootstrap.com/medzo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 08:38:00 GMT -->
</html>
