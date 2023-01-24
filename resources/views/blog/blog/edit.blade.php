
@extends('layouts/contentLayoutMaster')

@section('title', 'Blog Edit')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">
@endsection

@section('content')
<!-- Blog Edit -->
<div class="blog-edit-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="avatar me-75">
              <img src="{{auth()->user()->profile_photo_url}}" width="38" height="38" alt="Avatar" />
            </div>
            <div class="author-info">
              <h6 class="mb-25">{{ auth()->user()->name }}</h6>
              <p class="card-text">{{ \Carbon\Carbon::now()->isoFormat('LLL') }}</p>
            </div>
          </div>
          <!-- Form -->
          <form action="{{ route('site.blog.blogs.update', $blog->id) }}" class="mt-2" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="judul">@lang('Title')</label>
                  <input
                    type="text"
                    id="judul"
                    name="judul"
                    class="form-control @error('judul')
                      is-invalid
                    @enderror"
                    value="{{ old('judul', $blog->judul) }}"
                  />
                  @error('judul')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="slug">Slug</label>
                  <input
                    type="text"
                    id="slug"
                    name="slug"
                    class="form-control"
                    value="{{ old('slug', $blog->slug) }}"
                  />
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="category_id">@lang('Category')</label>
                  <select id="category_id" name="category_id" class="select2 form-select" required>
                    <option value="">@lang('Select') @lang('Category')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id ) == $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="tag">@lang('Tag')</label>
                  <select id="tag" name="tags[]" class="select2 form-select" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $blogTags)  ? 'selected' : null }}>{{ $tag->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="mb-2">
                  <label class="form-label" for="status">Status</label>
                  <select class="form-select" name="status" id="status">
                    <option value="1" {{ old('status', $blog->status ) == 1 ? 'selected' : '' }}>Published</option>
                    <option value="2" {{ old('status', $blog->status ) == 2 ? 'selected' : '' }}>Pending</option>
                    <option value="3" {{ old('status', $blog->status ) == 3 ? 'selected' : '' }}>Draft</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label class="form-label">Content</label>
                  <textarea name="isi" class="form-control my-editor" rows="100">{!! old('isi', $blog->isi) !!}</textarea>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="border rounded p-2">
                  <h4 class="mb-1">Featured Image</h4>
                  <div class="d-flex flex-column flex-md-row">
                    <img
                      src="{{ $blog->gambar ? Storage::disk('public')->url($blog->gambar) : asset('images/desa/berita/default.jpeg')}}"
                      id="blog-feature-image"
                      class="rounded me-2 mb-1 mb-md-0"
                      width="170"
                      height="110"
                      alt="Blog Featured Image"
                    />
                    <div class="featured-info">
                      <small class="text-muted">Required image resolution 800x400, image size 10mb.</small>
                      <p class="my-50">
                        <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                      </p>
                      <div class="d-inline-block">
                        <input type="hidden" name="oldGambar" value="{{ $blog->gambar }}">
                        <input class="form-control @error('gambar')
                          is-invalid
                        @enderror" type="file" id="blogCustomFile" name="gambar" value="{{ $blog->gambar }}" accept="image/*"/>
                        @error('gambar')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-50">
                <button type="submit" class="btn btn-primary me-1">@lang('Save')</button>
                <button type="reset" class="btn btn-outline-secondary">@lang('Cancel')</button>
              </div>
            </div>
          </form>
          <!--/ Form -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Blog Edit -->
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>
@endsection

@section('page-script')
{{-- <script src="{{asset(mix('js/scripts/pages/page-blog-edit.js'))}}"></script> --}}
<script src="https://cdn.tiny.cloud/1/73n33ctsrlqik5fcqanqnt5d0dj7ibezpp6b11o1j25k6616/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  (function (window, document, $) {
  'use strict';

  var select = $('.select2');
  var editor = '#blog-editor-container .editor';
  var blogFeatureImage = $('#blog-feature-image');
  var blogImageText = document.getElementById('blog-image-text');
  var blogImageInput = $('#blogCustomFile');

  if (select.length) {
    select.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent(),
        dropdownAutoWidth: true,
        width: '100%'
      });
    });
  }

  // Snow Editor
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);

  // Change featured image
  if (blogImageInput.length) {
    $(blogImageInput).on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
      reader.onload = function () {
        if (blogFeatureImage.length) {
          blogFeatureImage.attr('src', reader.result);
        }
      };
      reader.readAsDataURL(files[0]);
      blogImageText.innerHTML = blogImageInput.val();
    });
  }
  $('#judul').keyup(function(e) {
    $.get('{{ route('site.blog.cek.slug.blog') }}',
      { 'judul': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
})(window, document, jQuery);
</script>
@endsection
