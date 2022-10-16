@extends('layouts.app2')
@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bgEv">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Nos événements</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-100 mb-150">
		<div class="container">

			<!-- <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div> -->

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

			
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
							{{ $Events->links('vendor.pagination.custom') }} 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
@endsection