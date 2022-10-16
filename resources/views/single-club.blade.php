@extends('layouts.app2')

@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Voir Plus</p>
						<h1>{{$club->name}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ Voyager::image( $club->logo ) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h2>{{$club->name}}</h2>
						{!! $club->description !!}
						<div class="single-product-form">
							<p>
								<strong>Membres: </strong>{{$club->membre}}
								<br>
								<strong>Membres Bureau: </strong>{{$club->membreBureau}}
							</p>
							<p>Président:<strong> {{$User->name}}</strong></p>
						</div>
						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Nos</span> Èvenement</h3>
					</div>
				</div>
			</div>
			<div class="row">
			@foreach ($events as $event)
            	<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="events/detail/{{$event->id}}"><div class="latest-news-bg" style="background-image: url({{ Voyager::image( $event->image ) }})"></div></a>
						<div class="news-text-box">
							<h3><a href="events/detail/{{$event->id}}">{{$event->name}}</a></h3>
							<p class="blog-meta">
							<span class="date"><i class="fas fa-calendar"></i> {{$event->date}}</span>
								<span class="date"><i class="far fa-clock"></i> {{$event->time}}</span>
							</p>
							<p class="excerpt">{!! $event->description !!}</p>
							<a href="/events/detail/{{$event->id}}" class="read-more-btn">Lire la suite <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
	<!-- end more products -->
@endsection