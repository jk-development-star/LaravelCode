@extends('front.app_front')

@section('content')

@if($agent_detail->banner == '')
	@php $banner = 'default_banner.jpg'; @endphp
@else
	@php $banner = $agent_detail->banner; @endphp
@endif

<div class="agent-banner" style="background-image: url('{{ asset('public/uploads/user_photos/'.$banner) }}');">
	<div class="bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="agent">
					<div class="photo">
						@if($agent_detail->photo == '')
							<img src="{{ asset('public/uploads/user_photos/default_photo.jpg') }}" alt="">
						@else
							<img src="{{ asset('public/uploads/user_photos/'.$agent_detail->photo) }}" alt="">
						@endif
					</div>
					<div class="text">
						<h3>{{ $agent_detail->name }}</h3>
						<h4>{{ REGISTERED_ON }} {{ \Carbon\Carbon::parse($agent_detail->created_at)->format('d M, Y') }}</h4>
					</div>
				</div>

				@if( ($agent_detail->facebook != '') ||
				($agent_detail->twitter != '') ||
				($agent_detail->linkedin != '') ||
				($agent_detail->pinterest != '') ||
				($agent_detail->youtube != '') )
				<div class="social">
					<ul>
						@if($agent_detail->facebook != '')
						<li><a href="{{ $agent_detail->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						@endif

						@if($agent_detail->twitter != '')
						<li><a href="{{ $agent_detail->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
						@endif

						@if($agent_detail->linkedin != '')
						<li><a href="{{ $agent_detail->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
						@endif

						@if($agent_detail->pinterest != '')
						<li><a href="{{ $agent_detail->pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
						@endif

						@if($agent_detail->youtube != '')
						<li><a href="{{ $agent_detail->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
						@endif
					</ul>
				</div>
				@endif
			</div>
			<div class="col-md-6">
				<div class="contact">
					@if($agent_detail->address != '')
					<div class="item"><i class="fas fa-map-marker-alt"></i> {{ $agent_detail->address }}</div>
					@endif

					@if($agent_detail->phone != '')
					<div class="item"><i class="fas fa-phone-volume"></i> {{ $agent_detail->phone }}</div>
					@endif

					@if($agent_detail->email != '')
					<div class="item"><i class="fas fa-envelope"></i> {{ $agent_detail->email }}</div>
					@endif

					@if($agent_detail->website != '')
					<div class="item"><i class="fas fa-globe"></i> {{ $agent_detail->website }}</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-content">
	<div class="container">
		<div class="row listing pb_0">

			@foreach($all_listings as $row)
			<div class="col-md-4">
				<div class="listing-item">
					<div class="photo">
						<a href="{{ route('front_listing_detail',$row->listing_slug) }}"><img src="{{ asset('public/uploads/listing_featured_photos/'.$row->listing_featured_photo) }}" alt=""></a>
						<div class="category">
							<a href="{{ route('front_listing_category_detail',$row->rListingCategory->listing_category_slug) }}">{{ $row->rListingCategory->listing_category_name }}</a>
						</div>
						<div class="wishlist">
							<a href="{{ route('front_add_wishlist',$row->id) }}"><i class="fas fa-heart"></i></a>
						</div>
                        @if($row->is_featured == 'Yes')
                        <div class="featured-text">{{ FEATURED }}</div>
                        @endif
					</div>
					<div class="text">
						<h3><a href="{{ route('front_listing_detail',$row->listing_slug) }}">{{ $row->listing_name }}</a></h3>
						<div class="location">
							<a href="{{ route('front_listing_location_detail',$row->rListingLocation->listing_location_slug) }}"><i class="fas fa-map-marker-alt"></i> {{ $row->rListingLocation->listing_location_name }}</a>
						</div>

                        @php
                            $count=0;
                            $total_number = 0;
                            $overall_rating = 0;
                            $reviews = \App\Models\Review::where('listing_id',$row->id)->get();
                        @endphp

                        @if($reviews->isEmpty())

                        @else

                            @foreach($reviews as $item)
                                @php
                                    $count++;
                                    $total_number = $total_number + $item->rating;
                                @endphp
                            @endforeach

                            @php
                                $overall_rating = $total_number/$count;
                            @endphp

                            @if($overall_rating>0 && $overall_rating<=1)
                                @php $overall_rating = 1; @endphp

                            @elseif($overall_rating>1 && $overall_rating<=1.5)
                                @php $overall_rating = 1.5; @endphp

                            @elseif($overall_rating>1.5 && $overall_rating<=2)
                                @php $overall_rating = 2; @endphp

                            @elseif($overall_rating>2 && $overall_rating<=2.5)
                                @php $overall_rating = 2.5; @endphp

                            @elseif($overall_rating>2.5 && $overall_rating<=3)
                                @php $overall_rating = 3; @endphp

                            @elseif($overall_rating>3 && $overall_rating<=3.5)
                                @php $overall_rating = 3.5; @endphp

                            @elseif($overall_rating>3.5 && $overall_rating<=4)
                                @php $overall_rating = 4; @endphp

                            @elseif($overall_rating>4 && $overall_rating<=4.5)
                                @php $overall_rating = 4.5; @endphp

                            @elseif($overall_rating>4.5 && $overall_rating<=5)
                                @php $overall_rating = 5; @endphp

                            @endif

                        @endif

                        <div class="review">
                            @if($overall_rating == 5)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            @elseif($overall_rating == 4.5)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            @elseif($overall_rating == 4)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 3.5)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 3)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 2.5)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 2)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 1.5)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 1)
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif($overall_rating == 0)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @endif
                            <span>({{ $count }} {{ REVIEWS }})</span>
                        </div>
					</div>
				</div>
			</div>
			@endforeach


		</div>
	</div>
</div>

@endsection
