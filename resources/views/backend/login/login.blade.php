
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Metronic Bootstrap 5 Theme | Keenthemes</title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('public/backend')}}/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/izitost.css">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('public/backend')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/backend')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('public/backend')}}/assets/media/illustrations/progress-hd.png)">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="index.html" class="mb-12">
						<img alt="Logo" src="{{asset('public/uploads/logo/'.$logo->logo)}}" class="h-45px" />
					</a>

					<div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form  action="{{ route('admin.login') }}" method="POST" class="form w-100" novalidate="novalidate"  >
                                @csrf
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Sign In to Admin</h1>
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
								@error('email')
									<div style="color:red">{{ $message }}</div>
								@enderror

							</div>
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!-- <a href="authentication/flows/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a> -->
								</div>
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
								@error('password')
									<div style="color:red">{{ $message }}</div>
								@enderror
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Login</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
					
							</div>
			
						</form>
	
					</div>
	
				</div>

				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<!-- <a href="" class="text-muted text-hover-primary px-2">About</a>
						<a href="" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="" class="text-muted text-hover-primary px-2">Contact Us</a> -->
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('public/backend')}}/assets/js/izitost.js"></script>
		<script>
			@if(Session::has('messege'))
			var type = "{{Session::get('alert-type','info')}}"
			switch (type) {
				case 'success':

					iziToast.success({
						message: '{{ Session::get('messege') }}',
						'position': 'topCenter'
					});
					brack;
				case 'info':
					iziToast.info({
						message: '{{ Session::get('messege') }}',
						'position': 'topRight'
					});
					brack;
				case 'warning':
					iziToast.warning({
						message: '{{ Session::get('messege') }}',
						'position': 'topRight'
					});
					break;
				case 'error':
					iziToast.error({
						message: '{{ Session::get('messege') }}',
						'position': 'topRight'
					});
					break;
			}
			@endif
		</script>
		<script src="{{asset('public/backend')}}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('public/backend')}}/assets/js/scripts.bundle.js"></script>
		<script src="{{asset('public/backend')}}/assets/js/custom/authentication/sign-in/general.js"></script>
	</body>
	
</html>