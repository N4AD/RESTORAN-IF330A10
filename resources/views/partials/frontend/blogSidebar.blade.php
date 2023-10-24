<aside class="col-lg-3">
    <div class="widget">
        <div class="widget-title first">
            <h4>Latest Post</h4>
        </div>
        <ul class="comments-list">
            @if (!empty($latests))
                @foreach ($latests as $latest)
                <li>
                    <div class="alignleft">
                        <a href="{{ route('get.blog', $latest->id) }}"><img src="{{ asset($latest->thumbnail) }}" alt=""></a>
                    </div>
                    <small>{{ $latest->category->name }} - {{ $latest->created_at->format('d/m/Y') }}</small>
                    <h3><a href="{{ route('get.blog', $latest->id) }}" title="">{{ $latest->title }}</a></h3>
                </li>
                @endforeach
            @endif
        </ul>
    </div>
    <!-- /widget -->
    <div class="widget">
        <div class="widget-title">
            <h4>Categories</h4>
        </div>
        <ul class="cats">
            @if (!empty($categories))
                @foreach ($categories as $category)
                <li><a href="{{ route('category.blog', $category->id) }}">{{ $category->name }} <span>{{ $category->blogs->count() }}</span></a></li>
                @endforeach
            @endif
        </ul>
    </div>
</aside>
<!-- /aside -->