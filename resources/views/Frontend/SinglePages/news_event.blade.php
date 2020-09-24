
@extends('Frontend.Layouts.master')
	@section('content')


<br><br>
<section>
	<h2 style="text-align: center;font-family: Arial, Helvetica, sans-serif;">All news and events</h2><br>
	@foreach ($newsEvents as $newsevent)
		
	<div class="container" style="margin-top: 10px;">
		<h3><b>Title: {{$newsevent->short_title}}</b></h3>
		<h3><b>Date: </b>{{date('d-m-Y', strtotime($newsevent->date))}}</h3>
	</div><hr>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				
				<h3><b>Details:</b> </h3>
				<p style="text-align: justify;">{{$newsevent->long_title}}</p>
			</div>
			<div class="col-md-4">
				<img src="{{asset('public/Upload/NewsEvent_images/'.$newsevent->image)}}" style="width: 80%; height: 200px;">
			</div>

		</div>
	<br><br>

	</div>

	@endforeach

</section>



@endsection