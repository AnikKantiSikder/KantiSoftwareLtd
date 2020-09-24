
@extends('Frontend.Layouts.master')
	@section('content')

<br><br>
<div class="container" style="margin-bottom: 150px;">
	<div class="row">
		<div class="col-md-12">
			<h2 style="text-align: center;">Our vision</h2><br><br>
			<img src="{{asset('public/Upload/Vision_images/'.$vision->image)}}" style="width: 100%; height: 350px;">
			<p style="text-align: justify; padding-top: 80px;"> {{$vision->title}}</p>
		</div>

	</div>
<br><br>

</div>



@endsection