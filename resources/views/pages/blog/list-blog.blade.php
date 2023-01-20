@extends('pages.main')

@section('css')
    
@endsection

@section('title', __('News'.' Desa'))

@section('content')
		<section class="uni-banner">
			<div class="container">
				<div class="uni-banner-text-area">
					<h1>@lang('News')</h1>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li>@lang('News')</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="blog-details ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="row">
                            @foreach ($blogs as $blog)         
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="blog-card mt-0">
									<div class="blog-card-img">
										<a href="{{ route('berita.detail', $blog->slug) }}"
											><img src="{{ asset($blog->gambar ? $blog->gambar : 'assets/images/blog/b1.jpg') }}" alt="image"
										/></a>
									</div>
									<div class="blog-card-text-area">
										<div class="blog-date">
											<ul>
												<li>
													<i class="fas fa-user"></i> @lang('By')
													<a href="#">{{ $blog->creator->name }}</a>
												</li>
												<li><i class="far fa-comments"></i>{{ $blog->comments->count() }} @lang('Comments')</li>
												<li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
											</ul>
										</div>
										<h4>
											<a href="{{ route('berita.detail', $blog->slug) }}"
												>{{ $blog->judul }}</a
											>
										</h4>
										<p>
											{!! Str::limit($blog->isi, 50, '...') !!}
										</p>
										<a class="read-more-btn" href="{{ route('berita.detail', $blog->slug) }}"
											>@lang('Read More')</a
										>
									</div>
								</div>
							</div>
                            @endforeach
						</div>
						{{ $blogs->links('pages.partials.paginate') }}
					</div>
					<div class="col-lg-4">
						<div class="sidebar-area pl-20 pt-30">
							<div class="sidebar-card search-box">
								@include('pages.blog.form-cari')
							</div>
							<div class="sidebar-card sidebar-category mt-30">
								<h3>@lang('Category')</h3>
								<ul>
									@foreach ($category as $item)                                    
									<li>
										<a href="{{ route('berita.category', $item->slug) }}"
											><i class="fas fa-angle-right"></i> {{ $item->nama }}</a
										>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="sidebar-card recent-news mt-30">
								<h3>Popular Posts</h3>
								<div class="recent-news-card">
									<a href="blog-details.html"
										><img src="assets/images/inner-images/bds1.jpg" alt="image"
									/></a>
									<h5>
										<a href="blog-details.html">Responds To Citizens Advice</a>
									</h5>
									<p>1st Sep 2022</p>
								</div>
								<div class="recent-news-card">
									<a href="blog-details.html"
										><img src="assets/images/inner-images/bds2.jpg" alt="image"
									/></a>
									<h5>
										<a href="blog-details.html">Housing Advisers Program</a>
									</h5>
									<p>4th Sep 2022</p>
								</div>
								<div class="recent-news-card">
									<a href="blog-details.html"
										><img src="assets/images/inner-images/bds3.jpg" alt="image"
									/></a>
									<h5>
										<a href="blog-details.html"
											>Responds To a National Reports</a
										>
									</h5>
									<p>2nd Sep 2022</p>
								</div>
							</div>
							<div class="sidebar-card sidebar-tag mt-30">
								<h3>Tags</h3>
								<ul>
									@foreach ($tags as $item)
									<li><a href="{{ route('berita.tag', $item->slug) }}">{{ $item->nama }}</a></li>				
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection

@section('js')
    
@endsection
