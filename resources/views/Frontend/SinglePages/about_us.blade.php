
@extends('Frontend.Layouts.master')
	@section('content')

	<div class="container-fluid">
		<h3><b>Some of our works</b></h3>
	</div><hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<img src="{{ asset('public\Frontend\image\banner.PNG') }}" style="width: 100%; height: 280px;">
		</div>
		<div class="col-md-6">
			<img src="{{ asset('public\Frontend\image\banner2.PNG') }}" style="width: 100%; height: 280px;">
		</div>
	</div>
<br><br>
	<div class="row">
		<div class="col-md-6">
			<img src="{{ asset('public\Frontend\image\banner3.PNG') }}" style="width: 100%; height: 280px;">
		</div>
		<div class="col-md-6">
			<img src="{{ asset('public\Frontend\image\banner4.PNG') }}" style="width: 100%; height: 280px;">
		</div>
	</div>
</div>

	<!-- About us Section -->
	<section class="about_us">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid black;width: 11%;">About Us</h3>
					<p style="text-align: justify;">{{$aboutUs->description}}</p>
				</div>
			</div>
		</div>
	</section>


	@endsection