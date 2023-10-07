@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ EDIT_PASSWORD }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ EDIT_PASSWORD }}</li>
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

				<form action="{{ route('customer_update_password_confirm') }}" method="post">
                    @csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ NEW_PASSWORD }}</label>
								<input type="password" class="form-control" name="password">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ RETYPE_PASSWORD }}</label>
								<input type="password" class="form-control" name="re_password">
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
