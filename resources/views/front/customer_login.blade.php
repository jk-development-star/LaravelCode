@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ LOGIN }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ LOGIN }}</li>
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

						<form action="{{ route('customer_login_store') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="">{{ EMAIL_ADDRESS }}</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label for="">{{ PASSWORD }}</label>
								<input type="password" class="form-control" name="password">
							</div>
							@if($g_setting->google_recaptcha_status == 'Show')
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
							</div>
							@endif
							<button type="submit" class="btn btn-primary">{{ LOGIN }}</button>
							<a href="{{ route('customer_forget_password') }}" class="link">{{ FORGET_PASSWORD }}</a>
							<div class="new-user">
								{{ QUESTION_NEW_USER }} <a href="{{ route('customer_registration') }}" class="link">{{ REGISTER_NOW }}</a>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
