
@extends('Frontend.Layouts.master')
	@section('content')

	<div class="container" style="margin-top: 30px;text-align: center;">
		<h3><b>News and Events</b></h3>
		<h3><b>Date:</b>{{date('d-m-Y', strtotime($details->date))}}</h3><br><br>
	</div><hr>

<div class="container-fluid" style="margin-bottom: 150px;">
	<div class="row">
		<div class="col-md-6">
			
			<h3><b>Title:</b> {{$details->short_title}}</h3>
			<h3><b>Details:</b> </h3>
			<p style="text-align: justify;">{{$details->long_title}}</p>
		</div>
		<div class="col-md-6">
			<img src="{{asset('public/Upload/NewsEvent_images/'.$details->image)}}" style="width: 100%; height: 350px;">
		</div>

	</div>
<br><br>

</div>



@endsection