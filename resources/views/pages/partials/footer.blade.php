		<section class="footer">
			<div class="container">
				<div class="footer-content ptb-100">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="footer-links footer-contact">
								<h3>Kontak</h3>
								<div class="footer-contact-card">
									<i class="fas fa-map-marker-alt"></i>
									<h5>@lang('Location')</h5>
									<p>
										<a
											href="#"
											target="_blank"
											>{{ settings()->group('desa')->get('alamat_kantor') }}</a
										>
									</p>
								</div>
								<div class="footer-contact-card">
									<i class="fas fa-envelope"></i>
									<h5>Email:</h5>
									<p>
										<a
											href="#"
											><span
												class="__cf_email__"
												data-cfemail="95e6e0e5e5fae7e1d5f8f0f1effabbf6faf8"
												>{{ settings()->group('umum')->get('app_email') }}</span
											></a
										>
									</p>
								</div>
								<div class="footer-contact-card">
									<i class="fas fa-phone-alt"></i>
									<h5>@lang('Contact')</h5>
									<p><a href="tel:+13454567877">{{ settings()->group('umum')->get('app_tlp') }}</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="footer-links footer-quick-links">
								<h3>Aksi Cepat</h3>
								<ul>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="{{ route('pengaduan') }}">Pengaduan</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="#">Terms & Conditions</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="#">Privacy Policies</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="#">Accessibilty</a>
									</li>
									<li>
										<i class="fas fa-angle-right"></i>
										<a href="events.html">Recent Events</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
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
						© <strong>{{ settings()->group('umum')->get('app_nama') }}</strong> All Rights Reserved By
						<a target="_blank" href="#">Desa {{ settings()->group('desa')->get('nama_desa') }}</a>
					</p>
				</div>
			</div>
		</section>