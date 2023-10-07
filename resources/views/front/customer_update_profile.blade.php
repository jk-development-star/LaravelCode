@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ EDIT_PROFILE_INFORMATION }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ EDIT_PROFILE_INFORMATION }}</li>
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

				<form action="{{ route('customer_update_profile_confirm') }}" method="post">
                    @csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ NAME }}</label>
								<input type="text" class="form-control" value="{{ $user_data->name }}" disabled> <span class="text-danger">({{ NAME_CAN_NOT_BE_CHANGED }})</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ EMAIL_ADDRESS }}</label>
								<input type="email" class="form-control" value="{{ $user_data->email }}" disabled> <span class="text-danger">({{ EMAIL_CAN_NOT_BE_CHANGED }})</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ PHONE }}</label>
								<input type="text" class="form-control" name="phone" value="{{ $user_data->phone }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ COUNTRY }}</label>
								<input type="text" class="form-control" name="country" value="{{ $user_data->country }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ ADDRESS }}</label>
								<input type="text" class="form-control" name="address" value="{{ $user_data->address }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ STATE }}</label>
								<input type="text" class="form-control" name="state" value="{{ $user_data->state }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ CITY }}</label>
								<input type="text" class="form-control" name="city" value="{{ $user_data->city }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ ZIP }}</label>
								<input type="text" class="form-control" name="zip" value="{{ $user_data->zip }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ WEBSITE }}</label>
								<input type="text" class="form-control" name="website" value="{{ $user_data->website }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ FACEBOOK }}</label>
								<input type="text" class="form-control" name="facebook" value="{{ $user_data->facebook }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ TWITTER }}</label>
								<input type="text" class="form-control" name="twitter" value="{{ $user_data->twitter }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ LINKEDIN }}</label>
								<input type="text" class="form-control" name="linkedin" value="{{ $user_data->linkedin }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ INSTAGRAM }}</label>
								<input type="text" class="form-control" name="instagram" value="{{ $user_data->instagram }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ PINTEREST }}</label>
								<input type="text" class="form-control" name="pinterest" value="{{ $user_data->pinterest }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ YOUTUBE }}</label>
								<input type="text" class="form-control" name="youtube" value="{{ $user_data->youtube }}">
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
