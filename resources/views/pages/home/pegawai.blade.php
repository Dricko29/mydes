		<section class="team ptb-100">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>Pegawai</h3>
				</div>
				<div class="section-content">
					<div class="row justify-content-center">
						@foreach ($pegawais as $item)
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="team-card">
								<div class="team-card-img">
									<img src="{{ $item->foto ? Storage::disk('public')->url($item->foto) : asset('images/desa/foto/avatar.png') }}" alt="image" style="height: 300px"/>
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
									<h4>{{ $item->nama }}</h4>
									<p>{{ $item->jabatan->nama }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>