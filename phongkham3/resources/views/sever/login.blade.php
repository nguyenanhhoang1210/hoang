<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

	<meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
	<meta name="author" content="pixelcave">
	<meta name="robots" content="noindex, nofollow">

	<!-- Open Graph Meta -->
	<meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
	<meta property="og:site_name" content="Codebase">
	<meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<base href="{{ asset('') }}" >

	<!-- Icons -->
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="assets/img/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
	<!-- END Icons -->

	<!-- Stylesheets -->
	<!-- Codebase framework -->
	<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

	<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
	<!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
	<!-- END Stylesheets -->
</head>
<body>
	<div id="page-container" class="main-content-boxed">
		<!-- Main Container -->
		<main id="main-container">
			<!-- Page Content -->
			<div class="bg-gd-dusk">
				<div class="hero-static content content-full bg-white invisible" data-toggle="appear">
					<!-- Header -->
					<div class="py-30 px-5 text-center">
						<a class="link-effect font-w700" href="index.html">
							<i class="si si-fire"></i>
							<span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
						</a>
						<h1 class="h2 font-w700 mt-50 mb-10">Welcome to You</h1>
						<h2 class="h4 font-w400 text-muted mb-0">Please sign in</h2>
					</div>
					<!-- END Header -->
					<div>
						@if (count($errors) > 0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $err)
							{{ $err }}<br>
							@endforeach
						</div>
						@endif
						@if (session('thongbao'))
						<div class="alert alert-danger">
							{{ session('thongbao') }}
						</div>
						@endif
					</div>
					<!-- Sign In Form -->
					<div class="row justify-content-center px-5">
						<div class="col-sm-8 col-md-6 col-xl-4">
							<!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
							<!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
							<form class="js-validation-signin" action="sever/dangnhap" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group row">
									<div class="col-12">
										<div class="form-material floating">
											<input class="form-control" id="login-username" name="email" type="Email" autofocus required="">
											<label for="login-username">Email</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12">
										<div class="form-material floating">
											<input type="password" class="form-control" id="login-password" name="password" required="">
											<label for="login-password">Password</label>
										</div>
									</div>
								</div>
								<div class="form-group row gutters-tiny">
									<div class="col-12 mb-10">
										<button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
											<i class="si si-login mr-10"></i> Sign In
										</button>
									</div>
									<div class="col-12 mb-10">
										<a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="sever/quenmatkhau">
											<i class="fa fa-warning text-muted mr-5"></i> Forgot password
										</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END Sign In Form -->
				</div>
			</div>
			<!-- END Page Content -->
		</main>
		<!-- END Main Container -->
	</div>
	<!-- END Page Container -->

	<!-- Codebase Core JS -->
	<script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/bootstrap.bundle.min.js"></script>
	<script src="assets/js/core/jquery.slimscroll.min.js"></script>
	<script src="assets/js/core/jquery.scrollLock.min.js"></script>
	<script src="assets/js/core/jquery.appear.min.js"></script>
	<script src="assets/js/core/jquery.countTo.min.js"></script>
	<script src="assets/js/core/js.cookie.min.js"></script>
	<script src="assets/js/codebase.js"></script>

	<!-- Page JS Plugins -->
	<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

	<!-- Page JS Code -->
	<script src="assets/js/pages/op_auth_signin.js"></script>
</body>
</html>