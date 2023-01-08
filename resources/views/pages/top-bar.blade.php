		<section class="topbar plr-100 bg-black">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="topbar-left-area">
							<ul>
								<li>
									<a
										href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#7e0d0b0e0e110c0a3e131b1a0411501d1113"
										><i class="fas fa-envelope"></i>
										<span
											class="__cf_email__"
											data-cfemail="becdcbceced1cccafed3dbdac4d190ddd1d3"
											>[email&#160;protected]</span
										></a
									>
								</li>
								<li>
									<a href="https://goo.gl/maps/T3S78DrzqMegjsLy6"
										><i class="fas fa-map-marker-alt"></i> 2364 FL 34620, New
										York, USA</a
									>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div class="topbar-right-area">
							<ul>
								<li>
                                    @if (Auth::check())
                                    <a href="{{ Route::has('dashboard') ? route('dashboard') : 'javascript:void(0)' }}"
										><i class="fas fa-home"></i> Dashboard</a
									>
                                    @else
                                    <a href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}"
										><i class="fas fa-user"></i> Login</a
									>
                                    @endif
								</li>
								<li>
									<div class="language-select option-select-area">
										<i class="fas fa-globe"></i>
										<select>
											<option value="1">English</option>
											<option value="2">العربيّة</option>
											<option value="3">Dutch</option>
											<option value="4">Thai</option>
											<option value="5">简体中</option>
										</select>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>