


@extends('Frontend.Layouts.master')
	@section('content')
		@include('Frontend.Layouts.slider')

			<!-- Mission and Vision -->
			<section class="mission_vision">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid #000000; width: 70%;">Mission and Vision</h3>
						</div>
					</div>
					<div class="row">

						<div class="col-md-6">
							<img src="{{asset('public/Upload/Mission_images/'.$mission->image)}}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px;
							height: 250px;width: 250px;">
							<p style="text-align: justify;"><strong>Mission</strong>
								{{$mission->title}}
							</p>
						</div>


						<div class="col-md-6">
							<img src="{{asset('public/Upload/Vision_images/'.$vision->image)}}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px; height: 250px;width: 250px;">
							<p style="text-align: justify;"><strong>Vision</strong>
								{{$vision->title}}
							</p>
						</div>
					</div>
				</div>
			</section>

			<!-- News and Events -->
			<section class="nesw_events" style="background: #ddd">
				<div class="container">
					<div class="row">
						<div class="col-md-3" style="padding-top: 15px;">
							<h3 style="border-bottom: 1px solid #000;width: 85%">News and Events</h3>
						</div>
						<div class="col-md-9" style="padding-top: 15px;">
							<table class="table table-striped table-bordered table-hover table-md table-warning">
								<thead class="thead-dark">
									<tr>
										<th>SL</th>
										<th>Date</th>
										<th>Image</th>
										<th>Title</th>
										<th>Action</th>
									</tr>
								</thead>
								
									
								<tbody>
									@foreach ($newsEvent as $key => $newsevent)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{date('d-m-Y', strtotime($newsevent->date))}}</td>
										<td><img
											src="{{asset('public/Upload/NewsEvent_images/'.$newsevent->image)}}" style="height: 100px;width: 186px;"></td>
										<td>{{$newsevent->short_title}}</td>
										<td><a href="{{ route('news.event.details',$newsevent->id) }}" class="btn btn-info">Details</a></td>
									</tr>
									@endforeach
								</tbody>

								

							</table>
						</div>
					</div>
				</div>
			</section>


			<!-- Services -->
			<section class="our_services">
				<div class="container" style="padding-top: 15px">
					<!-- Nav tab -->
					<ul class="nav nav-tabs">
						@php
							$countService= 0;
						@endphp
						@foreach ($services as $service)
						<li class="nav-item">
							   <a href="#{{$service->id}}" class="nav-link @if ($countService== 0)
							   	{ active } @endif" data-toggle="tab">
							   	{{$service->short_title}}
							   </a>
						</li>
						@php
						    $countService++
						@endphp	
						@endforeach


					</ul>
					<!-- Tab Content -->
					<div class="tab-content">
						
							
						@php
							$countService= 0;
						@endphp
						@foreach ($services as $serviceok)

						<div id="{{$serviceok->id}}" class="container tab-pane @if ($countService== 0)
							   	{ active } @endif">
							   	
								<h3>{{$serviceok->short_title}}</h3>
								<p>{{$serviceok->long_title}}</p>
							</div>

						@php
						    $countService++;
						@endphp	
						@endforeach


					</div>

				</div>
			</section>

	@endsection


