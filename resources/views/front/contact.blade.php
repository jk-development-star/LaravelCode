@extends('front.app_front')

@section('content')

<div class="page-banner">
    <h1>{{ $contact_data->name }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ $contact_data->name }}</li>
		</ol>
	</nav>
</div>

<div class="page-content pt_0">

<div class="contact-page-map">
	{!! $contact_data->contact_map !!}
</div>


	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h4>{{ ADDRESS }}</h4>
                        <p>
                            {!! clean(nl2br($contact_data->contact_address)) !!}
                        </p>
                    </div>
                </div>
			</div>
			<div class="col-md-4">
				<div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="contact-text">
                        <h4>{{ PHONE_NUMBER }}</h4>
                        <p>
                            {!! clean(nl2br($contact_data->contact_phone)) !!}
                        </p>
                    </div>
                </div>
			</div>
			<div class="col-md-4">
				<div class="contact-item">
                    <div class="contact-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <h4>{{ EMAIL_ADDRESS }}</h4>
                        <p>
                            {!! clean(nl2br($contact_data->contact_email)) !!}
                        </p>
                    </div>
                </div>
			</div>
		</div>
		<div class="row contact-form">
			<div class="col-md-12">
				<h4 class="contact-form-title mt_50 mb_20">{{ CONTACT_FORM }}</h4>
				<form action="{{ route('front_contact_form') }}" method="post">
					@csrf
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>{{ NAME }} *</label>
								<input type="text" class="form-control" name="visitor_name">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>{{ EMAIL_ADDRESS }} *</label>
								<input type="email" class="form-control" name="visitor_email">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>{{ PHONE_NUMBER }}</label>
								<input type="text" class="form-control" name="visitor_phone">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>{{ MESSAGE }} *</label>
						<textarea name="visitor_message" class="form-control h-200" cols="30" rows="10"></textarea>
					</div>
					@if($g_setting->google_recaptcha_status == 'Show')
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                    </div>
                    @endif
					<button type="submit" class="btn btn-primary mt_10">{{ SEND_MESSAGE }}</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
