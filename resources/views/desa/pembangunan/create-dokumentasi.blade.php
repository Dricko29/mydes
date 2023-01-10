
@extends('layouts/contentLayoutMaster')

@section('title', 'Tambah Dokumentasi Pembangunan')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
  <div class="row">

    <!-- jQuery Validation -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Dokumentasi</h4>
          <a href="#" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
          <form id="jquery-val-form" action="{{ route('site.dokumentasi.pembangunan.detail.store', $pembangunan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">                
                <input
                  type="hidden"
                  class="form-control @error('pembangunan_id')
                      is-invalid
                  @enderror"
                  id="pembangunan_id"
                  name="pembangunan_id"
                  value="{{ $pembangunan->id }}"
                />

                <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="progres">Progres (%)</label>
                      <input
                        type="number"
                        class="form-control @error('progres')
                            is-invalid
                        @enderror"
                        id="progres"
                        name="progres"
                        value="{{ old('progres') }}"
                      />
                      @error('progres')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="tanggal">Tanggal</label>
                      <input type="text" class="form-control picker" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" autocomplete="off"/>
                    </div>
                </div>
    
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                        <img src="{{ asset('images/banner/banner-1.jpg') }}" id="preview-image-before-upload" alt="preview image" style="max-height: 250px;">
                    </div>
                </div>

                <div class="col-md-12 col-12">

                    <div class="mb-1">
                      <label for="customFile" class="form-label">Gambar</label>
                      <input class="form-control @error('gambar')
                        is-invalid
                      @enderror" type="file" id="gambar" name="gambar" value="{{ old('gambar') }}"/>
                      @error('gambar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
    
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                      <label class="d-block form-label" for="keterangan">Keterangan</label>
                      <textarea class="form-control @error('keterangan')
                          is-invalid
                      @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                      @error('keterangan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">Simpan</button>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <!-- /jQuery Validation -->
  </div>
</section>
<!-- /Validation -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <script>
    $(function () {
        'use strict';

        var bootstrapForm = $('.needs-validation'),
            jqForm = $('#jquery-val-form'),
            picker = $('.picker'),
            select = $('.select2');

        // select2
        select.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this
            .select2({
                dropdownParent: $this.parent()
            })
            .change(function () {
                $(this).valid();
            });
        });

        // Picker
        if (picker.length) {
            picker.flatpickr({
            allowInput: true,
            onReady: function (selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                $(instance.mobileInput).attr('step', null);
                }
            }
            });
        }

        $(document).ready(function (e) {
 
          
          $('#gambar').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
          
          });
          
        });

    });
  </script>
@endsection
