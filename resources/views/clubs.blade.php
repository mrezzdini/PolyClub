@extends('layouts.app2')

@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bgCl">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p></p>
						<h1>Nos Clubs</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-100 mb-150">
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

			<div class="row product-lists">
			@foreach ($Clubs as $club)
				<div class="col-lg-4 col-md-6 text-center strawberry">
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
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
							{{ $Clubs->links('vendor.pagination.custom') }} 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
@endsection