    <form action="{{ route('berita') }}" method="get">
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                placeholder="{{ __('Search Here..') }}"
                name="cari_blog"
                value="{{ request()->cari_blog }}"
            />
            <button class="btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>