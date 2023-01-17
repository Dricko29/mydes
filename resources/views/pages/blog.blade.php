		{{-- blog --}}
		<section class="blog ptb-100 bg-f9fbfe">
			<div class="container">
				<div class="default-section-title default-section-title-middle">
					<h3>@lang('Latest News & Updates')</h3>
					{{-- <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua quis
						ipsum suspendisse
					</p> --}}
				</div>
				<div class="section-content">
					<div class="row justify-content-center">
                        @foreach ($blogs as $blog)
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="blog-card">
								<div class="blog-card-img">
									<a href="blog-details.html"
										><img src="{{ asset($blog->gambar ? $blog->gambar : 'assets/images/blog/b1.jpg') }}" alt="image"
									/></a>
								</div>
								<div class="blog-card-text-area">
									<div class="blog-date">
										<ul>
											<li>
												<i class="fas fa-user"></i> @lang('By')
												<a href="posted-by.html">{{ Str::ucFirst($blog->creator->name) }}</a>
											</li>
											<li><i class="far fa-comments"></i> No Comment</li>
											<li><span class="badge bg-success">{{ $blog->category->nama }}</span></li>
											<li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</li>
										</ul>
									</div>
									<h4>
										<a href="blog-details.html">{{ $blog->judul }}</a>
									</h4>
									<p>
										{{ Str::limit($blog->isi, 50, '...') }}
									</p>
									<a class="read-more-btn" href="blog-details.html"
										>@lang('Read More')</a
									>
								</div>
							</div>
						</div>          
                        @endforeach
					</div>
				</div>
			</div>
		</section>