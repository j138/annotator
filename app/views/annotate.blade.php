@extends('layout/master')

@section('script')
<script type="text/javascript" src="lib/gumby-parallax/js/gumby.parallax.js"></script>
<script type="text/javascript" src="js/annotate_common.js"></script>
<link rel="stylesheet" type="text/css" href="crop/crop.css" />
@stop

@section('content')
<h1>アノテーションツールつくるよ</h1>
<p>画像を表示し、囲んだ領域をうにょうにょで表示するためのデモ</p>

<div class="crop-holder"></div>
@stop
