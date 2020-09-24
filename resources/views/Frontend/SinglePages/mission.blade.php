
@extends('Frontend.Layouts.master')
	@section('content')

<br><br>
<div class="container" style="margin-bottom: 150px;">
	<div class="row">
		<div class="col-md-12">
			<h2 style="text-align: center;">Our mission</h2><br><br>
			<img src="{{asset('public/Upload/Mission_images/'.$mission->image)}}" style="width: 100%; height: 350px;">
			<p style="text-align: justify; padding-top: 80px;"> {{$mission->title}}</p>
		</div>

	</div>
<br><br>

</div>



@endsection