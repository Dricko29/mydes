@extends('pages.main')

@section('css')
    
@endsection

@section('title', __('News'.' Desa'))

@section('content')
		<section class="uni-banner">
			<div class="container">
				<div class="uni-banner-text-area">
					<h1>{{ $category->nama }} @lang('News')</h1>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><a href="{{ route('berita') }}">@lang('News')</a></li>
						<li>{{ $category->nama }}</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="blog-details pt-70 pb-100">
			<div class="container">
				<div class="row">
					@foreach ($categoryBlogs as $item)
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="blog-card">
							<div class="blog-card-img">
								<a href="{{ route('berita.detail', $item->slug) }}"
									><img src="{{ asset($item->gambar ? $item->gambar : 'assets/images/blog/b1.jpg') }}" alt="image"
								/></a>
							</div>
							<div class="blog-card-text-area">
								<div class="blog-date">
									<ul>
										<li>
											<i class="fas fa-user"></i> @lang('By')
											<a href="#">{{ $item->creator->name }}</a>
										</li>
										<li><i class="far fa-comments"></i> {{ $item->comments()->where('status',2)->count() }} @lang('Comments')</li>
										<li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
									</ul>
								</div>
								<h4>
									<a href="{{ route('berita.detail', $item->slug) }}">{{ $item->judul }}</a>
								</h4>
								<p>
									{!! Str::limit($item->isi, 50, '...') !!}
								</p>
								<a class="read-more-btn" href="{{ route('berita.detail', $item->slug) }}">@lang('Read More')</a>
							</div>
						</div>
					</div>
						
					@endforeach
				</div>
				{!! $categoryBlogs->render('pages.partials.paginate') !!}
			</div>
		</section>
@endsection

@section('js')
    
@endsection
