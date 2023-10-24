<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    
	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
		href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
		href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Lora:ital@1&amp;family=Poppins:wght@400;500;600;700&amp;display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
		integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

	<!-- BASE CSS -->
	<link href="{{ asset('assets/frontend/css/vendors.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="{{ asset('assets/frontend/css/wizard.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/blog.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/shop.css') }}" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="{{ asset('assets/frontend/css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>

	<!-- Sweetalert included -->
	@include('sweetalert::alert')
	
	{{-- Header start --}}
    @include('partials.frontend.header')
	{{-- Header end --}}

    <main>
		@if (!Route::is('home'))
		<div class="hero_single inner_pages background-image mb-4" data-background="url({{ asset('assets/frontend/img/hero_general.jpg') }})">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						@yield('breadcrumb')
					</div>
				</div>
			</div>
			<div class="frame gray"></div>
		</div>
		@endif

        @yield('content')
    </main>

	{{-- Header start --}}
    @include('partials.frontend.footer')
	{{-- Header end --}}

	<div id="toTop"></div>

	<!-- Login Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header border-0 pb-0">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body pt-0">
					<div class="col-12">
						<div class="main_title text-center">
							<h2>Sign In</h2>
						</div>
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="form-group mb-3">
								<label for="email">Email</label>
								<input class="form-control" type="email" placeholder="Enter Your Email" id="email"
									name="email">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-5">
								<label for="password">Password</label>
								<input class="form-control" type="password" placeholder="Enter Your Password" id="password"
									name="password">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mt-4 mb-4">
								<div class="captcha">
									<span>{!! captcha_img() !!}</span>
									<button type="button" class="btn btn-danger" class="reload" id="reload">
										&#x21bb;
									</button>
								</div>
							</div>
							<div class="form-group mb-4">
								<input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
							</div>
							<div class="form-group mb-2">
								<input class="btn_1 full-width" type="submit" value="LogIn" id="submit-contact">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Register Modal -->
	<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header border-0 pb-0">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body pt-0">
					<div class="col-12">
						<div class="main_title text-center">
							<h2>Sign Up</h2>
						</div>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="form-group mb-3">
								<label for="name">Name</label>
								<input class="form-control" type="text" placeholder="Enter Your Name" id="name"
									name="name">
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-3">
								<label for="email">Email</label>
								<input class="form-control" type="email" placeholder="Enter Your Email" id="email"
									name="email">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-3">
								<label for="password">Password</label>
								<input class="form-control" type="password" placeholder="Enter Your Password" id="password"
									name="password">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-5">
								<label for="password_confirmation">Confirm Password</label>
								<input class="form-control" type="password" placeholder="Enter Your Password" id="password_confirmation"
									name="password_confirmation">
								@error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-2">
								<input class="btn_1 full-width" type="submit" value="Register" id="submit-contact">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!-- COMMON SCRIPTS -->
	<script src="{{ asset('assets/frontend/js/common_scripts.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/slider.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/common_func.js') }}"></script>
	<script src="{{ asset('assets/frontend/phpmailer/validate.js') }}"></script>

	<!-- SPECIFIC SCRIPTS (wizard form) -->
	<script src="{{ asset('assets/frontend/js/wizard/wizard_scripts.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/wizard/wizard_func.js') }}"></script>

    <!-- Page Specific JS File -->
    @yield('scripts')

	<script type="text/javascript">
		$('#reload').click(function () {
			$.ajax({
				type: 'GET',
				url: 'reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>
</body>

</html>
