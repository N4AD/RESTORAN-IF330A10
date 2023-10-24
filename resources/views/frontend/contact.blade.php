@extends('layouts.frontend')
@section('title', 'Contact')

@section('breadcrumb')
    <div class="col-xl-9 col-lg-10 col-md-8">
        <h1>Contact</h1>
        <p>Cooking delicious and tasty food since</p>
    </div>
@endsection
@section('content')
<div class="bg_gray">
    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="icon_tag_alt"></i>
                    <h2>Reservations</h2>
                    <a href="#">{{ $general ? $general->primary_phone:'' }}</a>
                    <a href="#">{{ $general ? $general->email:'' }}</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="icon_pin_alt"></i>
                    <h2>Address</h2>
                    <div>{!! $general ? $general->address:'' !!}</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="icon_clock_alt"></i>
                    <h2>Opening Hours</h2>
                    <div>MON to FRI 9am-6pm</div>
                    <div>SAT 9am-2pm</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container margin_60_40">
    <h5 class="mb_5">Drop Us a Line</h5>
    <div class="row">
        <div class="col-lg-4 col-md-6 add_bottom_25">
            <div id="message-contact"></div>
            <form action="{{ route('mail') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <input class="form-control" type="text" placeholder="Name" id="name_contact"
                        name="name">
                </div>
                <div class="form-group mb-3">
                    <input class="form-control" type="email" placeholder="Email" id="email_contact"
                        name="email">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" style="height: 150px;" placeholder="Message"
                        id="message_contact" name="message"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn_1 full-width" type="submit" value="Submit" id="submit-contact">
                </div>
            </form>
        </div>
        <div class="col-lg-8 col-md-6 add_bottom_25">
            <iframe class="map_contact"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7297.073003182172!2d90.3769254742574!3d23.8705871381209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c40f82bd8f7b%3A0x8c888da8fc05ec94!2sSector%2012%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1665155473199!5m2!1sen!2sbd"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection
