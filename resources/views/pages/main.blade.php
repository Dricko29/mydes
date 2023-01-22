<!DOCTYPE html>
<html lang="zxx">
	<!-- Mirrored from templates.hibootstrap.com/medzo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 08:37:43 GMT -->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="{{ asset('') }}/assets/css/animate.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/fontawsome.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/fonts/flaticon.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/meanmenu.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/nice-select.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/owl.theme.default.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/magnific-popup.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/odometer.min.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/style.css" />
		<link rel="stylesheet" href="{{ asset('') }}/assets/css/responsive.css" />
		@yield('css')
		<title>{{ settings()->group('umum')->get('app_nama', 'MyDes') }} - @yield('title')</title>
		<link rel="icon" type="image/png" href="{{ asset(settings()->group('umum')->get('app_logo', 'assets/images/fav-icon.png')) }}" />
	</head>
	<body>
        @include('pages.partials.top-bar')

		@include('pages.partials.menu')

        @yield('content')

		@include('pages.partials.footer')

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
		<script src="{{ asset('') }}/assets/js/jquery.min.js"></script>
		<script src="{{ asset('') }}/assets/js/jquery-ui.min.js"></script>
		<script src="{{ asset('') }}/assets/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('') }}/assets/js/meanmenu.js"></script>
		<script src="{{ asset('') }}/assets/js/owl.carousel.min.js"></script>
		<script src="{{ asset('') }}/assets/js/magnific-popup.min.js"></script>
		<script src="{{ asset('') }}/assets/js/TweenMax.js"></script>
		<script src="{{ asset('') }}/assets/js/nice-select.min.js"></script>
		<script src="{{ asset('') }}/assets/js/form-validator.min.js"></script>
		<script src="{{ asset('') }}/assets/js/contact-form-script.js"></script>
		<script src="{{ asset('') }}/assets/js/ajaxchimp.min.js"></script>
		<script src="{{ asset('') }}/assets/js/owl.carousel2.thumbs.min.js"></script>
		<script src="{{ asset('') }}/assets/js/appear.min.js"></script>
		<script src="{{ asset('') }}/assets/js/odometer.min.js"></script>
		<script src="{{ asset('') }}/assets/js/custom.js"></script>
		@yield('js')
	</body>

	<!-- Mirrored from templates.hibootstrap.com/medzo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2023 08:38:00 GMT -->
</html>
