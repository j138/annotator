<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="lib/underscore/js/underscore.js"></script>
		<script type="text/javascript" src="lib/underscore.string/js/underscore.string.js"></script>
		<script type="text/javascript" src="lib/gumby/js/modernizr-2.6.2.min.js"></script>
		<script type="text/javascript" src="lib/gumby/js/gumby.min.js"></script>
		<script type="text/javascript" src="lib/gumby/js/plugins.js"></script>
		<script type="text/javascript" src="lib/gumby/js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="lib/gumby/css/gumby.css" />
		<link rel="stylesheet" type="text/css" href="lib/gumby/css/style.css" />
		@yield('script')
	</head>
	<body>
		<div class="row">
			<div class="twelve columns">
				@yield('content')
			</div>
		</div>
	</body>
</html>
