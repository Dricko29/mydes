@extends('pages.main')

@section('css')
    
@endsection

@section('title', __('News'.' Desa'))

@section('content')
    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1>Blog Details</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-text-area details-text-area">
                        <img src="{{ $blog->gambar ? Storage::disk('public')->url($blog->gambar) :  asset('images/desa/berita/default.jpeg') }}" alt="image" />
                        <div class="blog-date">
                            <ul>
                                <li>
                                    <i class="fas fa-user"></i> @lang('By')
                                    <a href="#">{{ $blog->creator->name }}</a>
                                </li>
                                <li><i class="far fa-comments"></i> {{ $blog->comments->count() }} @lang('Comments')</li>
                                <li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                            </ul>
                        </div>
                        <h3 class="mt-0">{{ $blog->judul }}</h3>
                        <p>
                            {!! $blog->isi !!}
                        </p>
                    </div>
                    <div class="blog-text-footer mt-30">
                        <div class="tag-area">
                            <ul>
                                <li><i class="fas fa-tags"></i></li>
                                @foreach ($blog->tags as $item)
                                <li><a href="#">{{ $item->nama }},</a></li>      
                                @endforeach
                            </ul>
                        </div>
                        <div class="social-icons">
                            <ul>
                                <li><span>Share:</span></li>
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
                    <div class="bd-comments details-text-area">
                        <h3>@lang('Comments')</h3>
                        @foreach ($blog->comments as $item)                         
                        <div class="comment-card">
                            <img src="{{ asset('images/desa/foto/avatar.png') }}" alt="image" style="height: 50px"/>
                            <h5>{{ $item->nama }}</h5>
                            <p>
                                {{ $item->isi }}
                            </p>
                            {{-- <a href="#bd-form">Reply</a> --}}
                        </div>
                        @endforeach
                    </div>
                    <div class="bd-form details-text-area" id="bd-form">
                        <h3>@lang('Leave A Reply')</h3>
                        @if (session('success'))                           
                        <p class="text-success">
                            {{ session('success') }}
                        </p>
                        @elseif (session('error'))
                        <p class="text-danger">
                            {{ session('error') }}
                        </p>
                        @else
                        <p class="text-danger">
                            Komentar baru terbit setelah disetujui oleh admin*
                        </p>
                        @endif
                        <form action="{{ route('berita.comment.user') }}" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="blog_id" id="" value="{{ $blog->id }}">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input
                                        type="text"
                                        class="form-control @error('nama')
                                            is-invalid
                                        @enderror"
                                        placeholder="@lang('Name')"
                                        name="nama"
                                        value="{{ old('nama') }}"
                                        required
                                    />
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input
                                        type="text"
                                        class="form-control @error('no_tlp')
                                            is-invalid
                                        @enderror"
                                        placeholder="@lang('Phone Number')"
                                        name="no_tlp"
                                        value="{{ old('no_tlp') }}"
                                        required
                                    />
                                    @error('no_tlp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input
                                        type="text"
                                        class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                        placeholder="@lang('Email')"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                    />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea
                                        rows="5"
                                        class="form-control @error('isi')
                                            is-invalid
                                        @enderror"
                                        placeholder="@lang('Your Messages')"
                                        name="isi"
                                        required
                                    >{{ old('isi') }}</textarea>
                                    @error('isi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button class="default-button" type="submit">
                                        @lang('Post A Comment')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area pl-20 pt-30">
                        <div class="sidebar-card search-box">
                            <form>
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Search Here.."
                                        required
                                    />
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
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
