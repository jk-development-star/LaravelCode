@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ EDIT_BANNER }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ EDIT_BANNER }}</li>
		</ol>
	</nav>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="user-sidebar">
					@include('front.customer_sidebar')
				</div>
			</div>
			<div class="col-md-9">

				<form action="{{ route('customer_update_banner_confirm') }}" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ EXISTING_BANNER }}</label>
								<div>
									@if($user_data->banner == '')
									<img src="{{ asset('public/uploads/user_photos/default_banner.jpg') }}" alt="" class="w-400">
									@else
									<img src="{{ asset('public/uploads/user_photos/'.$user_data->banner) }}" alt="" class="w-400">
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ CHANGE_BANNER }}</label>
								<div>
									<input type="file" name="banner">
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">{{ UPDATE }}</button>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection
