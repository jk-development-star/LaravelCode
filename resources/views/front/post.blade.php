@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ $blog_detail->post_title }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item"><a href="{{ route('front_blogs') }}">{{ $blog->name }}</a></li>
			<li class="breadcrumb-item active">{{ $blog_detail->post_title }}</li>
		</ol>
	</nav>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="blog-item-single">
					<div class="featured-photo">
						<img src="{{ asset('public/uploads/post_photos/'.$blog_detail->post_photo) }}">
					</div>
					<div class="text">
						{!! clean($blog_detail->post_content) !!}
					</div>


					@if($blog_detail->comment_show == 'Yes')
					<div class="comment mt_40">

						<h2 class="mb_25">{{ count($comments) }} {{ COMMENTS }}</h2>

						@if(count($comments) == 0)
                            <div class="text-danger">{{ NO_COMMENT_FOUND }}</div>
                        @else
                        	@foreach($comments as $row)
                        		@php
                        		$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($row->person_email) . '?s=32';
								header("content-type: image/jpeg");
                        		@endphp
                        		<div class="comment-item">
									<div class="photo">
										<img src="{{ $gravatar_link }}">
									</div>
									<div class="text">
										<h4>{{ $loop->iteration . '. ' . $row->person_name }}</h4>
										<div class="date">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</div>
										<div class="des">
											<p>
												{!! clean(nl2br($row->person_comment)) !!}
											</p>
										</div>
									</div>
								</div>
                            @endforeach
                        @endif


						<h2 class="mt_50 mb_20">{{ POST_COMMENT }}</h2>
						<form action="{{ route('front_comment') }}" method="post">
							@csrf
							<input type="hidden" name="blog_id" value="{{ $blog_detail->id }}">
                            <input type="hidden" name="post_slug" value="{{ $blog_detail->post_slug }}">
                            <input type="hidden" name="comment_status" value="Pending">
							<div class="row mb_20">
								<div class="col">
									<label for="">{{ NAME }}</label>
									<input type="text" class="form-control" name="person_name">
								</div>
								<div class="col">
									<label for="">{{ EMAIL }}</label>
									<input type="email" class="form-control" name="person_email">
								</div>
							</div>
							<div class="row mb_20">
								<div class="col">
									<label for="">{{ COMMENT }}</label>
									<textarea name="person_comment" class="form-control h-200" cols="30" rows="10"></textarea>
								</div>
							</div>
							@if($g_setting->google_recaptcha_status == 'Show')
							<div class="row mb_20">
								<div class="col">
									<div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
								</div>
							</div>
		                    @endif
							<div class="row">
								<div class="col">
									<button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
								</div>
							</div>
						</form>

					</div>
					@endif

				</div>
			</div>

			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget">
						<h3>{{ CATEGORIES }}</h3>
						<div class="type-1">
							<ul>
								@foreach($categories as $item)
								<li><a href="{{ route('front_category',$item->category_slug) }}">{{ $item->category_name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
