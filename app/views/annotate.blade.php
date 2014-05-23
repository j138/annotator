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
<h2>ↀωↀ  &lt; 特定部位を囲んでね！</h2>
<div class="crop-holder"></div>
@stop

@section('matrix_table')
<table id="matrix_table" class="striped">
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
@stop
