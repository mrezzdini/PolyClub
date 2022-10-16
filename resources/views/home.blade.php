@extends('layouts.app2')

@section('content')
	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Club & Evénements</p>
							<h1>Tous nos Activités dans un même endroit</h1>
							<div class="hero-btns">
								<a href="/admin/login" class="boxed-btn">Contactez-nous</a>
								<a href="/register" class="bordered-btn">S'inscrire</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->



	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Clubs</h3>
					</div>
				</div>
			</div>

			
			<div class="row">
			@foreach ($Clubs as $club)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="clubs/detail/{{$club->id}}"><img src="{{ Voyager::image( $club->logo ) }}"alt=""></a>
						</div>
						<h4>{{$club->name}}</h4>
						<p class="product-price"> <span>Membres: {{$club->membre}}</span> </p>
						<a href="clubs/detail/{{$club->id}}" class="cart-btn"><i class="fas fa-plus"></i> Plus</a>
					</div>
				</div>
				@endforeach
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="/clubs" class="boxed-btn" ><h4 style="color : white;">+</h4></a>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->

    <!-- end cart banner section -->
	
	<!-- advertisement section -->
	<div class="abt-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=l7xWpdDNTeg" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2009</p>
						<h2>We are <span class="orange-text">Polytechnic</span></h2>
						<p>The Polytechnic School of Sousse is a large private international teaching and research school, accredited EUR-ACE and whose sole vocation is to train engineers with a technical and scientific level in accordance with the best international standards. Its mission is resolutely to guarantee excellent professional integration to its young graduates by propelling them directly to employability.</p>
						<a href="/a-propos" class="boxed-btn mt-4">Plus d'info</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container" style="">
        	<h3><span class="orange-text">L'école</span> est le berceau de la vie associative.</h3>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Nos</span> Evénements</h3>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($Events as $event)
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="events/detail/{{$event->id}}"><div class="latest-news-bg" style="background-image: url({{ Voyager::image( $event->image ) }})"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">{{$event->name}}</a></h3>
							<p class="blog-meta">
								<span class="date"><i class="fas fa-calendar"></i> {{$event->date}}</span>
								<span class="date"><i class="far fa-clock"></i> {{$event->time}}</span>
							</p>
							<div class="excerpt">{!! $event->description !!}</div>
							<a href="events/detail/{{$event->id}}" class="read-more-btn">Lire la suite <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				@endforeach
				</div>

			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="/events" class="boxed-btn" ><h4 style="color : white;">+</h4></a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

@endsection