		<div class="navbar-area">
			<div class="main-responsive-nav">
				<div class="container-fluid plr-100">
					<div class="mobile-nav">
						<a href="/" class="logo"
							><img src="{{ asset(settings()->group('umum')->get('app_logo', 'assets/images/small-logo.png')) }}" alt="logo" style="height: 40px"/>
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
							<img src="{{ asset(settings()->group('umum')->get('app_logo', 'assets/images/logo.png')) }}" alt="logo" style="height: 50px"/>
						</a>
						<div
							class="collapse navbar-collapse mean-menu"
							id="navbarSupportedContent"
						>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="{{ route('home') }}" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Home</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('berita') }}" class="nav-link {{ Route::currentRouteName() == 'berita' ? 'active' : '' }}">Berita</a>
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
									<a href="#" class="nav-link dropdown-toggle {{ request()->is('*pengaduan*') ? 'active' : '' }}">Pengaduan </a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="{{ route('list.pengaduan') }}" class="nav-link {{ Route::currentRouteName() == 'list.pengaduan' ? 'active' : '' }}">List Pengaduan</a>
										</li>
										<li class="nav-item">
											<a href="{{ route('pengaduan') }}" class="nav-link {{ Route::currentRouteName() == 'pengaduan' ? 'active' : '' }}">Form Pengaduan</a>
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

