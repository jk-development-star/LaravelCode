@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ RESET_PASSWORD }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ RESET_PASSWORD }}</li>
		</ol>
	</nav>
</div>

<div class="page-content pt_50 pb_60">
	<div class="container">
		<div class="row cart">

			<div class="col-md-12">
				<div class="reg-login-form">
					<div class="inner">

						@php
							$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
						@endphp

						<form action="{{ route('customer_reset_password_update') }}" method="post">
							@csrf
							<input type="hidden" name="current_email" value="{{ $email }}">
							<div class="form-group">
								<label for="">{{ NEW_PASSWORD }}</label>
								<input type="password" class="form-control" name="new_password">
							</div>
							<div class="form-group">
								<label for="">{{ RETYPE_PASSWORD }}</label>
								<input type="password" class="form-control" name="retype_password">
							</div>
							@if($g_setting->google_recaptcha_status == 'Show')
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
							</div>
							@endif
							<button type="submit" class="btn btn-primary">{{ UPDATE }}</button>
							<div class="new-user">
								<a href="{{ route('customer_login') }}">{{ BACK_TO_LOGIN_PAGE }}</a>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
