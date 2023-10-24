@extends('layouts.frontend')

@section('content')
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            @if (!empty($sliders))
                @foreach ($sliders as $slider)
                <div class="owl-slide cover lazy" data-bg="url({{ asset($slider->thumbnail) }})">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 m-auto static">
                                    <div class="slide-text white text-center">
                                        <h2 class="owl-slide-animated owl-slide-title">{{ $slider->title }}</h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            {{ $slider->sub_title }}
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1 btn_scroll"
                                                href="{{ route('menu') }}" role="button">Check Our Menu</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div id="icon_drag_mobile"></div>
    </div>

    <div class="pattern_2">
        <div class="container margin_120_100 home_intro">
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-5 text-lg-center d-none d-lg-block" data-cue="slideInUp">
                    <figure>
                        <img src="{{ asset('assets/frontend/img/home_1.jpg') }}" data-src="{{ asset('assets/frontend/img/home_1.jpg') }}" width="354" height="440"
                            alt="" class="img-fluid lazy">
                        <a href="https://www.youtube.com/watch?v=MO7Hi_kBBBg" class="btn_play" data-cue="zoomIn"
                            data-delay="500"><span class="pulse_bt"><i class="arrow_triangle-right"></i></span></a>
                    </figure>
                </div>
                <div class="col-lg-5 pt-lg-4" data-cue="slideInUp" data-delay="500">
                    <div class="main_title">
                        <span><em></em></span>
                        <h2>About us</h2>
                        <p>{{ $general ? $general->story_title:'' }}</p>
                    </div>
                    <p>{!! $general ? $general->story_description:'' !!}</p>
                    <p><img src="{{ asset('assets/frontend/img/signature.png') }}" width="140" height="50" alt="" class="mt-3"></p>
                </div>
            </div>
        </div>
    </div>


    <section class="container margin_120_100">
        <div class="row">
            <div class="col-xl-4">
                <a href="{{ route('menu') }}" class="img_container">
                    <img src="{{ asset('assets/frontend/img/banner_1.jpg') }}" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Our Menu</h3>
                        <p>View Our Specialites</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="https://foodhub.click/public/blogs" class="img_container">
                    <img src="{{ asset('assets/frontend/img/banner_3.jpg') }}" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Our Blogs</h3>
                        <p>Checkout our latest blogs</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="https://foodhub.click/public/contact" class="img_container">
                    <img src="{{ asset('assets/frontend/img/banner_4.jpg') }}" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Say Something?</h3>
                        <p>Send us a message</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="https://foodhub.click/public/gallery/photo" class="img_container">
                    <img src="{{ asset('assets/frontend/img/banner_6.jpg') }}" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Photo Gallery</h3>
                        <p>See photos from our latest event</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="menu.html" class="img_container">
                    <img src="{{ asset('assets/frontend/img/banner_5.jpg') }}" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>BOOK A TABLE</h3>
                        <p>Reserve a table for you</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="https://foodhub.click/public/gallery/video" class="img_container">
                    <img src="{{ asset('assets/frontend/img/banner_6.jpg') }}" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Video Gallery</h3>
                        <p>See videos from our latest event</p>
                    </div>
                </a>
            </div>
        </div>
    </section>


    <div class="bg_gray">
        <div class="container margin_120_100" data-cue="slideInUp">
            <div class="main_title center mb-5">
                <span><em></em></span>
                <h2>Our Menu</h2>
            </div>
            <div class="row homepage add_bottom_25">
                <div class="col-xl-8">
                    <div class="row">
                        @if (!empty($menus))
                            @foreach ($menus as $menu)
                            <div class="col-lg-6">
                                <div class="menu_item">
                                    <figure class="magnific-gallery" data-cue="slideInUp">
                                        <a href="{{ $menu->thumbnail }}" title="{{ $menu->title }}"
                                            data-effect="mfp-zoom-in">
                                            <img src="{{ $menu->thumbnail }}"
                                                data-src="{{ $menu->thumbnail }}" class="lazy" alt="">
                                        </a>
                                    </figure>
                                    <div class="menu_title">
                                        <h3>{{ $menu->title }}</h3><em>${{ $menu->price }}</em>
                                    </div>
                                    <p>Raspberries, Blackberries</p>
                                    @guest
                                    <a href="javascript:void(0)" class="btn_1" data-bs-toggle="modal" data-bs-target="#exampleModal">add to cart</a>
                                    @else
                                    <a class="btn_1" href="{{ route('cart.add', [$menu->id, auth()->user()->id]) }}">add to cart</a>
                                    @endguest
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="banner lazy" data-bg="url({{ asset('assets/frontend/img/banner_bg.jpg') }})">
                        <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <div class="text">
                                <small>Reserve a Table</small>
                                <p>Hamburgher, Chips, Mix Sausages, Beer, Muffin</p>
                                <a href="reservations.html" class="btn_1">Reserve now</a>
                            </div>
                            <!-- <figure class="d-none d-lg-block"><img src="img/banner.svg" alt="" width="200"
                                    height="200" class="img-fluid"></figure> -->
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center"><a href="#0" class="btn_1 outline" data-cue="zoomIn">Download Menu (PDF)</a></p>
        </div>
    </div>

    <div class="call_section lazy">
        <div class="overlay">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-6 text-center">
                        <div class="box_1" data-cue="slideInUp">
                            <h2>Enjoy<span>a Special Event with us!</span></h2>
                            <p>Only Buy 2 black burger packs and you'll get 10% off and 1 free fries.</p>
                            <a href="contacts.html" class="btn_1 mt-3">Contact us</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-6 text-center">
                        <div class="call_section_img" data-cue="slideInUp">
                            <img src="{{ asset('assets/frontend/img/bg_call_section.jpg') }}" alt="call" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pattern_2 pattern_calendar">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12" data-cue="slideInUp">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Reserve a table</h2>
                            <p>or Call us at {{$general ? $general->primary_phone:''}}</p>
                        </div>
                        <div id="wizard_container">
                            <form action="{{ route('reserve') }}" method="POST">
                                @csrf
                                <input type="text" name="websiste" id="website" value="">
                                <div id="middle-wizard">
                                    <div class="step">
                                        <h3 class="main_question"><strong>1/3</strong> Please Select a date</h3>
                                        <div class="form-group">
                                            <input type="hidden" name="date" id="datepicker_field"
                                                class="required">
                                        </div>
                                        <div id="DatePicker"></div>
                                    </div>
                                    <!-- /step-->
                                    <div class="step">
                                        <h3 class="main_question"><strong>2/3</strong> Select time and guests</h3>
                                        <div class="step_wrapper">
                                            <h4>Time</h4>
                                            <div class="radio_select add_bottom_15">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="time_1" name="time" value="12.00am"
                                                            class="required">
                                                        <label for="time_1">12.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_2" name="time" value="12.30pm"
                                                            class="required">
                                                        <label for="time_2">12.30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_3" name="time" value="1.00pm"
                                                            class="required">
                                                        <label for="time_3">1.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_4" name="time" value="1.30pm"
                                                            class="required">
                                                        <label for="time_4">1.30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_5" name="time" value="08.00pm"
                                                            class="required">
                                                        <label for="time_5">8.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_6" name="time" value="08.30pm"
                                                            class="required">
                                                        <label for="time_6">8.30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_7" name="time" value="09.00pm"
                                                            class="required">
                                                        <label for="time_7">9.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_8" name="time" value="09.30pm"
                                                            class="required">
                                                        <label for="time_8">9.30</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="step_wrapper">
                                            <h4>How many people?</h4>
                                            <div class="radio_select">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="people_1" name="people" value="1"
                                                            class="required">
                                                        <label for="people_1">1</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_2" name="people" value="2"
                                                            class="required">
                                                        <label for="people_2">2</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_3" name="people" value="3"
                                                            class="required">
                                                        <label for="people_3">3</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_4" name="people" value="4"
                                                            class="required">
                                                        <label for="people_4">4</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit step">
                                        <h3 class="main_question"><strong>3/3</strong> Please fill with your details
                                        </h3>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control required"
                                                placeholder="First and Last Name">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" name="email"
                                                        class="form-control required" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="phone"
                                                        class="form-control required" placeholder="Your Telephone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name="description"
                                                placeholder="Please provide any additional info"></textarea>
                                        </div>
                                        <div class="form-group terms">
                                            <label class="container_check">Please accept our <a href="#"
                                                    data-bs-toggle="modal" data-bs-target="#terms-txt">Terms and
                                                    conditions</a>
                                                <input type="checkbox" name="terms" value="Yes" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="bottom-wizard">
                                    <button type="button" name="backward" class="backward">Prev</button>
                                    <button type="button" name="forward" class="forward">Next</button>
                                    <button type="submit" name="process" class="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
