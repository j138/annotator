<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="lib/underscore/js/underscore.js"></script>
		<script type="text/javascript" src="lib/gumby/js/gumby.min.js"></script>
		<link rel="stylesheet" type="text/css" href="lib/gumby/css/gumby.css" />
		@yield('script')
	</head>
	<body>
		<div class="row">
			<div class="twelve columns">
				<h1>アノテーションツールつくるよ</h1>
				@yield('content')
			</div>
		</div>
	</body>
</html>
