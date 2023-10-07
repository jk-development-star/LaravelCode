@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ $pricing_data->name }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ $pricing_data->name }}</li>
		</ol>
	</nav>
</div>

<div class="page-content">
	<div class="container">
		<div class="row pricing">

			@foreach($pricing as $row)
			<div class="col-lg-4 mb_30">
				<div class="card mb-5 mb-lg-0">
					<div class="card-body">
						<h5 class="card-title text-muted text-uppercase text-center">{{ $row->package_name }}</h5>
						<h6 class="card-price text-center">${{ $row->package_price }}<span class="period">/{{ $row->valid_days }} {{ DAYS }}</span></h6>
						<hr>
						<ul class="fa-ul">
							<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->total_listings }} {{ LISTING_ALLOWED }}</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->total_listings }} {{ AMENITIES_PER_LISTING }}</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->total_photos }} {{ PHOTOS_PER_LISTING }}</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->total_videos }} {{ VIDEOS_PER_LISTING }}</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->total_social_items }} {{ SOCIAL_ITEMS_PER_LISTING }}</li>
							<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->total_additional_features }} {{ ADDITIONAL_FEATURES_PER_LISTING }}</li>
							<li>
								@if($row->allow_featured == 'Yes')
								<span class="fa-li"><i class="fas fa-check"></i></span>
								{{ FEATURED_LISTING_ALLOWED }}
								@else
								<span class="fa-li"><i class="fas fa-times"></i></span>
								{{ FEATURED_LISTING_NOT_ALLOWED }}
								@endif
							</li>
						</ul>
						<a href="{{ route('customer_package') }}" class="btn btn-block btn-primary">
							@if($row->package_type == 'Free')
							{{ ENROLL_NOW }}
							@else
							{{ BUY_NOW }}
							@endif
						</a>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>

@endsection
