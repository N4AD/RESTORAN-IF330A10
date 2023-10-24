@extends('layouts.frontend')
@section('title', 'Menu')
@section('breadcrumb')
    <div class="col-xl-9 col-lg-10 col-md-8">
        <h1>Menu</h1>
        <p>Cooking delicious and tasty food since</p>
    </div>
@endsection
@section('content')
    <div class="pattern_2">
        <div class="container margin_60_40" data-cues="slideInUp">
            <div class="main_title center">
                <span><em></em></span>
                <h2>Starters</h2>
                <p>Start with the appetiser first</p>
            </div>

            <div class="row justify-content-center mb-5">
                @if (!empty($starters))
                    @foreach ($starters as $item)
                    <div class="col-md-4 col-xl-3" data-cue="slideInUp">
                        <div class="item menu_item_grid">
                            <div class="item-img magnific-gallery" data-cue="slideInUp">
                                <img src="{{ $item->thumbnail }}" alt="menu item">
                                <div class="content">
                                    <a href="{{ $item->thumbnail }}" title="Chicken with Garlic"
                                        data-effect="mfp-zoom-in"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->category->name }}</p>
                            <div class="price_box">
                                <span class="new_price">${{ $item->price }}</span>
                                {{-- <span class="old_price">${{ $item->price }}</span> --}}
                            </div>
                            @guest
                                    <a href="javascript:void(0)" class="btn_1" data-bs-toggle="modal" data-bs-target="#exampleModal">add to cart</a>
                                    @else
                                    <a class="btn_1" href="{{ route('cart.add', [$item->id, auth()->user()->id]) }}">add to cart</a>
                                    @endguest
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="main_title center" data-cue="slideInUp">
                <span><em></em></span>
                <h2>All Dishes</h2>
                <p>Choose food that suits your taste, because your taste is our priority</p>
            </div>
            <div class="row justify-content-center mb-3">
                @if (!empty($menus))
                    @foreach ($menus as $item)
                    <div class="col-md-4 col-xl-3" data-cue="slideInUp">
                        <div class="item menu_item_grid">
                            <div class="item-img magnific-gallery" data-cue="slideInUp">
                                <img src="{{ $item->thumbnail }}" alt="menu item">
                                <div class="content">
                                    <a href="{{ $item->thumbnail }}" title="Chicken with Garlic"
                                        data-effect="mfp-zoom-in"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->category->name }}</p>
                            <div class="price_box">
                                <span class="new_price">${{ $item->price }}</span>
                                {{-- <span class="old_price">${{ $item->price }}</span> --}}
                            </div>
                            @guest
                                    <a href="javascript:void(0)" class="btn_1" data-bs-toggle="modal" data-bs-target="#exampleModal">add to cart</a>
                                    @else
                                    <a class="btn_1" href="{{ route('cart.add', [$item->id, auth()->user()->id]) }}">add to cart</a>
                                    @endguest
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

        <div class="banner lazy">
            <p class="text-center"><a href="#0" class="btn_1 outline">Download Menu (PDF)</a></p>
        </div>
    </div>
@endsection
