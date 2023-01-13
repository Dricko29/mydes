@extends('pages.main')

@section('css')
    
@endsection

@section('title', 'Form '.__('Complaint'))

@section('content')
		<section class="uni-banner">
			<div class="container">
				<div class="uni-banner-text-area">
					<h1>Form Pengaduan</h1>
					<ul>
						<li><a href="/">Home</a></li>
						<li>Form Pengaduan</li>
					</ul>
				</div>
			</div>
		</section>
		<section class="contcat-card-area pt-70 pb-100">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="contact-card">
							<i class="fas fa-map-marker-alt"></i>
							<h5>@lang('Location')</h5>
							<p>
								<a href="https://goo.gl/maps/zZEtThmwqkPz2GTE7" target="_blank"
									>{{ settings()->group('desa')->get('alamat_kantor') }}</a
								>
							</p>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="contact-card">
							<i class="fas fa-envelope"></i>
							<h5>Email</h5>
							<p>
								<a
									href="#"
									><span
										class="__cf_email__"
										data-cfemail="000000000000000000000000"
										>{{settings()->group('umum')->get('app_email')}}</span
									></a
								>
							</p>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="contact-card">
							<i class="fas fa-phone-alt"></i>
							<h5>@lang('Phone')</h5>
							<p><a href="#">{{ settings()->group('umum')->get('app_tlp') }}</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="contact-form-area pb-100">
			<div class="container">

				@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close btn btn-primary" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
				</div>
				@endif
				<div class="default-section-title default-section-title-middle">
					<h3>Form @lang('Complaint')</h3>
					<p>
						@lang('Please fill in the complaint form')
					</p>
				</div>
				<div class="section-content">
					<div class="row">
						{{-- <div class="col-lg-4">
							<div class="google-map pr-20">
								<iframe
									class="g-map"
									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d78339.6186660101!2d-106.73462151445834!3d52.15045315715413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5304f6bf47ed992b%3A0x5049e3295772690!2sSaskatoon%2C%20SK%2C%20Canada!5e0!3m2!1sen!2sbd!4v1629617114800!5m2!1sen!2sbd"
								></iframe>
							</div>
						</div> --}}
						<div class="col-lg-12">
							<div class="contact-form-text-area">
								<form  action="{{ route('pengaduan.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="row align-items-center">
										<div class="col-md-6 col-sm-6 col-12">
											<div class="form-group">
                                                <label for="nama">Nama</label>
												<input
													type="text"
													class="form-control @error('nama')
                                                        is-invalid
                                                    @enderror"
													placeholder="@lang('Name')"
													id="name"
                                                    name="nama"
													value="{{ old('nama') }}"
													required
													data-error="@lang('Please enter your name')"
												/>
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-12">
											<div class="form-group">
                                                <label for="nik">Nik</label>
												<input
													type="text"
													class="form-control @error('nik')
                                                        is-invalid
                                                    @enderror"
													placeholder="@lang('Nik')"
													id="name"
                                                    name="nik"
													value="{{ old('nik') }}"
													required
													data-error="@lang('Please enter your name')"
												/>
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-12">
											<div class="form-group">
                                                <label for="email">Email</label>
												<input
													type="email"
													name="email"
													class="form-control @error('email')
                                                        is-invalid
                                                    @enderror"
													placeholder="@lang('Email')"
													id="email"
													value="{{ old('email') }}"
													required
													data-error="@lang('Please enter your Email')"
												/>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-12">
											<div class="form-group">
                                                <label for="tlp">No Telpon</label>
												<input
													type="text"
													name="tlp"
													class="form-control @error('tlp')
                                                        is-invalid
                                                    @enderror"
													placeholder="@lang('Phone Number')"
													id="tlp"
													value="{{ old('tlp') }}"
													required
													data-error="@lang('Please enter your phone number')"
												/>
                                                @error('tlp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-12">
											<div class="form-group">
                                                <label for="judul">Judul</label>
												<input
													type="text"
													name="judul"
													class="form-control"
													placeholder="@lang('Title')"
													id="judul"
													value="{{ old('judul') }}"
													required
													data-error="@lang('Please enter your subject')"
												/>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-12">
											<div class="form-group">
                                                <label for="foto">Foto</label>
												<input
													type="file"
													name="foto"
													class="form-control @error('foto')
                                                        is-invalid
                                                    @enderror"
													placeholder="@lang('Photo')"
													id="foto"
													data-error="@lang('Please enter your subject')"
												/>
                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-12">
											<div class="form-group">
                                                <label for="isi">Pesan`</label>
												<textarea
													name="isi"
													id="isi"
													class="form-control @error('isi')
														is-invalid
													@enderror"
													placeholder="@lang('Your Messages')"
													cols="30"
													rows="5"
													required
													data-error="@lang('Please enter your message')"
												>{{ old('isi') }}</textarea>
												@error('isi')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
												<div class="help-block with-errors"></div>
											</div>
										</div>
										{{-- <div class="col-lg-12">
											<div class="form-group">
												<div class="form-check">
													<input
														name="gridCheck"
														value="I agree to the terms and privacy policy."
														class="form-check-input"
														type="checkbox"
														id="gridCheck"
														required
													/>
													<label class="form-check-label" for="gridCheck">
														I agree to the <a href="#">terms</a> and
														<a href="#">privacy policy</a>
													</label>
													<div
														class="help-block with-errors gridCheck-error"
													></div>
												</div>
											</div>
										</div> --}}
										<div class="col-md-12 col-sm-12 col-12">
											<button class="default-button" type="submit">
												<span>@lang('Send Complaint')</span>
											</button>
											<div id="msgSubmit" class="h6 text-center hidden"></div>
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>		
@endsection

@section('js')
    
@endsection
