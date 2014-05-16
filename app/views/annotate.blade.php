@extends('layout/master')

@section('script')
<link rel="stylesheet" type="text/css" href="crop/crop.css" />
@stop

@section('content')
ねこねこ<br />
画像を表示し、囲んだ領域をうにょうにょで表示するためのデモ
<div class="crop-holder">
	<img class="target-img" src="crop/cat01.jpg" />

	<!-- 囲みたい領域をwidth, heightで指定 -->
	<div class="crop-wrapper" style="left:40px;top:20px; width:140px; height:130px">
		<div class="crop-vline"></div>
		<div class="crop-vline right"></div>
		<div class="crop-hline"></div>
		<div class="crop-hline bottom"></div>
	</div>

	<!-- 2個めも可能 -->
	<div class="crop-wrapper" style="left:150px;top:120px; width:80px; height:80px">
		<div class="crop-vline"></div>
		<div class="crop-vline right"></div>
		<div class="crop-hline"></div>
		<div class="crop-hline bottom"></div>
	</div>
</div>

@stop
