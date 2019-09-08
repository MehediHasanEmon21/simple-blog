@extends('master')
@section('sidebar')
	@parent
	<p>This About Sidebar</p>
@endsection
@section('component')
	<h1>About Page</h1>
	@php
		$name = 'Akib';
		echo $name;
		$year = 2018;
		$favourites = ['food'=>'pasta','sports'=>'football','fruit'=>'mango','movie'=>'Godfather']
	@endphp
	@if($year % 4 === 0 && $year % 100 === 0 && $year % 400 === 0)
		{{ $year }} is Leap Year
	@else
		{{ $year }} isn't Leap Year
	@endif
	<br>
	<h1>Favourite</h1><br>
	@foreach($favourites as $key=>$favourite)
		{{ strtoupper($key) }} : {{ $favourite }} <br>
	@endforeach
@endsection