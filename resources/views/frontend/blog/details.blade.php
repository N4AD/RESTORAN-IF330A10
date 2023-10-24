@extends('layouts.frontend')
@section('title', 'Blog Details')

@section('breadcrumb')
    <div class="col-xl-9 col-lg-10 col-md-8">
        <h1>{{ $blog->title }}</h1>
        <p>Cooking delicious and tasty food since</p>
    </div>
@endsection

@section('content')
<div class="container margin_60_40">
    <div class="row">
        <div class="col-lg-9">
            <div class="singlepost">
                <figure><img alt="" class="img-fluid w-100" src="{{ asset($blog->thumbnail) }}"></figure>
                <h1>{{ $blog->title }}</h1>
                <div class="postmeta">
                    <ul>
                        <li><a href="#"><i class="fas fa-folder-open"></i></i> {{ $blog->category->name }}</a></li>
                        <li><i class="fas fa-calendar-alt"></i> {{ $blog->created_at->format('d/m/Y') }}</li>
                    </ul>
                </div>
                <div class="post-content">
                    <div class="dropcaps">
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.frontend.blogSidebar', [$categories, $latests])
    </div>
</div>
@endsection
