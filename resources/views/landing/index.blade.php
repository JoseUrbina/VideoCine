<!DOCTYPE html>
<html>
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyecto Cinematográfico</title>

        <link rel="shortcut icon" href="{{ asset('dummies/favicon.ico') }}">

		<!-- GOOGLE FONTS : begin -->
		<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
		<!-- GOOGLE FONTS : end -->

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.custom.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/skins/default.css') }}">
		<!--link rel="stylesheet" type="text/css" href="library/css/custom.css"> uncomment if you want to use custom CSS definitions -->
		<!-- STYLESHEETS : end -->

        <!--[if lte IE 8]>
			<link rel="stylesheet" type="text/css" href="library/css/oldie.css">
			<script src="library/js/respond.min.js" type="text/javascript"></script>
        <![endif]-->
		<script src="{{ asset('js/modernizr.custom.min.js') }}" type="text/javascript"></script>
		<style>
			html,body
			{
			    padding: 0 0 65px;
			    margin: 0;
			}
			/*----------------------------------------------------------*/
			footer
			{
			    width: 100%;
			    bottom: 0;
			    position:fixed;
			    height: 65px;
			}
		</style>

	</head>
	<body class="enable-fixed-header ">

		<!-- HEADER : begin -->
		<header id="header">
			<div class="container">
				<div class="header-inner clearfix">

					<!-- HEADER BRANDING : begin -->
					<div class="header-branding">
						<a href="{{url('/')}}"><img src="{{asset('/dummies/logo.png')}}" alt="Casa"></a>
					</div>
					<!-- HEADER BRANDING : end -->

					<!-- HEADER NAVBAR : begin -->
					<div class="header-navbar">						

						<!-- HEADER TOOLS : begin -->
						<div class="header-tools" style="padding-top: 20px">					

							<!-- HEADER ADD OFFER : begin -->
							<span class="header-add-offer"><a href="{{ url('login')}}" class="button"><i class="fa fa-plus"></i> Inicio de sesión</a></span>
							<!-- HEADER ADD OFFER : end -->

						</div>
						<!-- HEADER TOOLS : end -->

					</div>
				</div>
			</div>
		</header>
		<!-- HEADER : end -->

		<!-- FOOTER : begin -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- FOOTER TEXT : begin -->
						<p>Copyright 2013 &copy; Casa. All rights reserved. Powered by <a href="#">AudioCine</a></p>
						<!-- FOOTER TEXT : end -->

					</div>
					<div class="col-sm-4">

						<!-- FOOTER SOCIAL : begin -->
						<ul class="footer-social custom-list">
							<li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i><span>Facebook</span></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i><span>Twitter</span></a></li>
							<li><a href="#" title="Google+"><i class="fa fa-google-plus-square"></i><span>Google+</span></a></li>
							<li><a href="#" title="LinkedIn"><i class="fa fa-linkedin-square"></i><span>LinkedIn</span></a></li>
							<li><a href="#" title="Pinterest"><i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>
						</ul>
						<!-- FOOTER SOCIAL : end -->

					</div>
				</div>
			</div>
		</footer>
		<!-- FOOTER : end -->

		<!-- SCRIPTS : begin -->
		<script src="{{ asset('js/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.ba-outside-events.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.inview.min.js') }}" type="text/javascript"></script>
		<!--[if lte IE 8]>
		<script src="library/js/jquery.placeholder.js" type="text/javascript"></script>
		<![endif]-->
		<script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('twitter/jquery.tweet.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
		<!-- SCRIPTS : end -->

	</body>
</html>