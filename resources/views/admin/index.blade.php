@extends('layout.admin')

@section('title',$title)

@section('content')
<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>optimist SVG chart animation</title>



<link rel="stylesheet" href="/index/css/style.css">


</head>

<body>
    <h1><font color="red">11月商城销售情况走势图</h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<svg id="svg" viewBox="0 -200 710 450">
<desc>点击还原动画</desc>
<defs>
<filter id="f" filterUnits="userSpaceOnUse" id="shadow" x="-10" y="-150" width="120%" height="120%">
<feGaussianBlur in="SourceAlpha" stdDeviation="5" result="blur"></feGaussianBlur>
<feOffset in="blur" dx="3" dy="20" result="shadow"></feOffset>
<feFlood flood-color="rgba(0,0,0,.2)" result="color" />
<feComposite in ="color" in2="shadow" operator="in" />
<feComposite in="SourceGraphic"/>
</filter>
</defs>
<g filter="url(#f)">
<path id="chart" fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke="blue" stroke-width="7" d="M50,150L100,112 150,134 200,90 250,112 300,42 350,77 400,45 450,10 500,15 550,-15 650,-100 " />

<path id="arrow" fill="blue
" d="M0,0L0,-10L14,0L0,10"/>
</g>
</svg>



<script  src="/index/js/index.js"></script>




</body>

</html>
@endsection