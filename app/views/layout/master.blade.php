<html lang="ja">
<head>
	<!-- common -->
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
	<div class="navbar metro" id="nav1">
		<a class="toggle" gumby-trigger="#nav1 > ul" href="#"><i class="icon-menu"></i></a>
		<h1 class="four columns logo">
			<a href="#">(ΦωΦ)</a>
		</h1>
		<ul class="eight columns">
			<li>
				<a href="#">Category</a>
				<div class="dropdown">
				<ul>
					<li><a href="#">Cat</a></li>
					<li><a href="#">Rat</a></li>
					<li><a href="#">Fat</a></li>
				</ul>
				</div>
			</li>
		</ul>
		@yield('info-alert')
		</div>
	<div class="row">
		<div class="nine columns">
			@yield('content')
			@yield('completed')
		</div>
		<div class="three columns">
			@yield('scrap_table')
		</div>
	</div>
	<div class="row">
		<div class="twelve columns">
		</div>
	</div>
</body>
</html>
