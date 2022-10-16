@extends('layouts.app2')

@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Voir Plus </p>
						<h1>{{$event->name}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- Event description -->
	<div class="single-product mt-100 mb-70">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ Voyager::image( $event->image ) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<p class="single-product-pricing">{{$event->name}}</p>
                        <p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> {{$club->name}}</span>
								<span class="date"><i class="fas fa-calendar"></i>{{$event->date}}</span>
								<span class="date"><i class="far fa-clock"></i> {{$event->time}}</span>
							</p>
						<h3>Prix : {{$event->price}} DT</h3>
						<p>{!! $event->description !!} </p>
                        <p><strong>Categories: </strong>  </p>
						<div class="single-product-form">
						<h3>Contact:</h3>
							<p>
								<strong>Nom: </strong>{{$event->name_res}}
								<br>
								<strong>Telephone: </strong>{{$event->phone}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end Event description -->

    <!-- Comments -->
	<div class="mt-50 mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-article-section">

						<div class="comments-list-wrap">
							<h3 class="comment-count-title">{{$nbTotal}} Comments</h3>
							<div class="comment-list">
							
								<div class="single-comment-body">
								@foreach ($comments as $comment)
								<div class="single-comment-body">
								@foreach ($users as $user)
										@if($user->id == $comment->user_id)
									<div class="comment-user-avater">
										<img src="{{ Voyager::image( $user->avatar ) }}" alt="">
									</div>
									<div class="comment-text-body">
									
										<h4> <span id="userId">{{$user->name}} </span> 
											<span class="comment-date">{{$comment->created_at}}</span> 
											<button class="btn-reply" id="btnReply" onclick="
												var button = document.getElementById('btnReply');
												var text = document.getElementById('userId');
												var reply = document.getElementById('replyId');
												var comment = document.getElementById('comment');
													comment.placeholder = 'Comment on \' '+text.innerText+'\' comment ';
													reply.value = {{$comment->id}}	
											"><label for="comment">reply</label></button>
											
										</h4>
										<h4></h4>
										@endif
									@endforeach
										<p>{{$comment->comment}}</p>
									</div>
								</div>
								
									@foreach ($reps as $rep)
									@if($rep->reply == $comment->id)
									<div class="single-comment-body child">
									@foreach ($users as $user)
										@if($user->id == $rep->user_id)
										<div class="comment-user-avater">
											<img src="{{ Voyager::image( $user->avatar ) }}" alt="">
										</div>
										<div class="comment-text-body">
											<h4>{{$user->name}} <span class="comment-date">{{$rep->created_at}}</span> </h4>
											@endif
									@endforeach
											<p>{{$rep->comment}}</p>
										</div>
									</div>
									@endif
									@endforeach
								@endforeach
							</div>
						</div>

						@if(Auth::check())
						<div class="comment-template col-lg-9">
							<h4>Leave a comment</h4>
							<p>If you have a comment dont feel hesitate to send us your opinion.</p>
							<form action="{{$event->id}}/store" method="POST">
							@csrf
								<input type="hidden" name="id_event" value="{{ $event->id }}">
								<input type="hidden" id="replyId" name="reply" value="">
								<input type="hidden" name="user" value="{{ Auth::id() }}">
								<p><textarea name="comment" id="comment" name="comment" cols="30" rows="10" placeholder="Qu'en pensez-vous ?"></textarea></p>
								<p><input type="submit" value="Poster mon commentaire"></p>
							</form>
						</div>
						@endif
						@if(!(Auth::check()))
						<div class="comment-template col-lg-9">
							<h4>Leave a comment</h4>
							<p>Pour pouvoir faire un commentaire, vous devez vous connecter.
								<a href="/admin/login">Commectez-Vous </a>
							</p>
							
						</div>
						@endif

						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end Comments -->
@endsection