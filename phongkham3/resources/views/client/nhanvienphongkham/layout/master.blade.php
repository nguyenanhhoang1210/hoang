<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Find easily a doctor and book online an appointment" />
	<meta name="author" content="Ansonika" />
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="assets2/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" type="image/x-icon" href="assets2/img/apple-touch-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets2/img/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets2/img/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="assets2/img/apple-touch-icon-144x144-precomposed.png" />
	<base href="{{ asset('') }}" >
	<!-- BASE CSS -->
	<link href="assets2/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets2/css/style.css" rel="stylesheet" />
	<link href="assets2/css/menu.css" rel="stylesheet" />
	<link href="assets2/css/vendors.css" rel="stylesheet" />
	<link href="assets2/css/icon_fonts/css/all_icons_min.css" rel="stylesheet" />
	<link href="assets2/css/blog.css" rel="stylesheet" />
	<!-- YOUR CUSTOM CSS -->
	<link href="assets2/css/custom.css" rel="stylesheet" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

		@include('client.nhanvienphongkham.layout.header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
		@include('client.nhanvienphongkham.layout.footer')



	<!-- include js files -->

	<!--customjs-->
	<script src="assets2/cdn-cgi/scripts/84a23a00/cloudflare-static/email-decode.min.js"></script><script src="assets2/js/jquery-2.2.4.min.js"></script>
	<script src="assets2/js/common_scripts.min.js"></script>
	<script src="assets2/js/functions.js"></script>
	@yield('script')
</body>
</html>
