@extends('layout/master')

@section('script')
<!-- scripts -->
<script type="text/javascript" src="lib/gumby-parallax/js/gumby.parallax.js"></script>
<script type="text/javascript" src="js/annotate_common.js"></script>
<link rel="stylesheet" type="text/css" href="crop/crop.css" />

<script type="text/javascript" src="lib/imgareaselect/js/jquery.imgareaselect.dev.js"></script>
<link rel="stylesheet" type="text/css" href="lib/imgareaselect/css/imgareaselect-default.css" />
@stop


@section('content')
<h2 id="title">ↀωↀ  &lt; <span id="title-msg">Mark it alrignt!</span></h2>
<div class="crop-holder"></div>
@stop


@section('scrap_table')
<div class="disp-data-area">
	<table id="scrap_table" class="striped">
		<thead>
			<tr>
				<th>X</th>
				<th>Y</th>
				<th>W</th>
				<th>H</th>
				<th>(ΦωΦ)</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div id="save-scraps" class="medium secondary btn">
		<a href="#">Mark It!</a>
	</div>
	<div id="remove-scraps" class="medium danger btn">
		<a href="#">Destroy</a>
	</div>
</div>
@stop

@section('info-alert')
	<li id="alert" class="success alert">すべてのチェックが完了しました。</li>
@stop


@section('completed')
<div id="completed-announce">
	<!-- <img src="http://thecatapi.com/api/images/get?format=src&#38;type=jpg"> -->
	<img src="./crop/completed.jpg">
</div>
@stop
