@extends('front.app_front')

@section('content')

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons' async='async'></script>

<div class="listing-single-banner" style="background-image: url('{{ asset('public/uploads/listing_featured_photos/'.$detail->listing_featured_photo)  }}');">
	<div class="bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>{{ $detail->listing_name }}</h1>
				<div class="location">
					<i class="fas fa-map-marker-alt"></i> {{ $detail->rListingLocation->listing_location_name }}
				</div>
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
					<span>({{ count($reviews) }} {{ REVIEWS }})</span>
				</div>
				<div class="call">
					<i class="fas fa-phone-volume"></i> {{ $detail->listing_phone }}
				</div>
				<div class="listing-items">
					<a href="{{ route('front_listing_category_detail',$detail->rListingCategory->listing_category_slug) }}">
						<i class="far fa-edit"></i> {{ $detail->rListingCategory->listing_category_name }}
					</a>
					<a href="{{ route('front_add_wishlist',$detail->id) }}">
						<i class="fas fa-heart"></i> {{ ADD_TO_WISHLIST }}
					</a>
					<a href="" data-toggle="modal" data-target="#send_message_modal">
						<i class="far fa-envelope"></i> {{ SEND_MESSAGE }}
					</a>

                    <!-- Send Message Modal -->
                    <div class="modal fade modal_listing_detail" id="send_message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ SEND_MESSAGE }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('front_listing_detail_send_message') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="listing_name" value="{{ $detail->listing_name }}">
                                        <input type="hidden" name="listing_slug" value="{{ $detail->listing_slug }}">
                                        <input type="hidden" name="agent_name" value="{{ $agent_detail->name }}">
                                        <input type="hidden" name="agent_email" value="{{ $agent_detail->email }}">
                                        <div class="form-group">
                                            <label for="">{{ NAME }}</label>
                                            <div>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ EMAIL }}</label>
                                            <div>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ PHONE }}</label>
                                            <div>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ MESSAGE }}</label>
                                            <div>
                                                <textarea name="message" class="form-control h-100" cols="30" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        @if($g_setting->google_recaptcha_status == 'Show')
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">{{ SEND_MESSAGE }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Send Message Modal -->


					<a href="" data-toggle="modal" data-target="#report_modal">
						<i class="far fa-flag"></i> {{ REPORT }}
					</a>


                    <!-- Report Modal -->
                    <div class="modal fade modal_listing_detail" id="report_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ SUBMIT_REPORT }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('front_listing_detail_report_listing') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="listing_name" value="{{ $detail->listing_name }}">
                                        <input type="hidden" name="listing_slug" value="{{ $detail->listing_slug }}">
                                        <div class="form-group">
                                            <label for="">{{ NAME }}</label>
                                            <div>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ EMAIL }}</label>
                                            <div>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ PHONE }}</label>
                                            <div>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ MESSAGE }}</label>
                                            <div>
                                                <textarea name="message" class="form-control h-100" cols="30" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        @if($g_setting->google_recaptcha_status == 'Show')
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">{{ SUBMIT_REPORT }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Report Modal -->


				</div>

				@if(!$listing_social_items->isEmpty())
				<div class="social">
					<ul>
						@foreach($listing_social_items as $row)
						@if($row->social_icon == 'Facebook')
                    	@php $icon_code = 'fab fa-facebook-f'; @endphp

                    	@elseif($row->social_icon == 'Twitter')
                    	@php $icon_code = 'fab fa-twitter'; @endphp

                    	@elseif($row->social_icon == 'LinkedIn')
                    	@php $icon_code = 'fab fa-linkedin-in'; @endphp

                    	@elseif($row->social_icon == 'YouTube')
                    	@php $icon_code = 'fab fa-youtube'; @endphp

                    	@elseif($row->social_icon == 'Pinterest')
                    	@php $icon_code = 'fab fa-pinterest-p'; @endphp

                    	@elseif($row->social_icon == 'GooglePlus')
                    	@php $icon_code = 'fab fa-google-plus-g'; @endphp

                    	@elseif($row->social_icon == 'Instagram')
                    	@php $icon_code = 'fab fa-instagram'; @endphp

                    	@endif
						<li>
							<a href="{{ $row->social_url }}"><i class="{{ $icon_code }}"></i></a>
						</li>
						@endforeach
					</ul>
				</div>
				@endif

			</div>
		</div>
	</div>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12">
				<div class="listing-page">
					<h2><i class="fas fa-folder"></i> {{ DESCRIPTION }}</h2>
					<p>
						{!! clean($detail->listing_description) !!}
					</p>

					@if(!$listing_photos->isEmpty())
					<div class="sep"></div>
					<h2><i class="fas fa-image"></i> {{ PHOTOS }}</h2>
					<div class="photo-all">
						<div class="row">
							@foreach($listing_photos as $row)
							<div class="col-md-6 col-lg-4">
								<div class="item">
									<a href="{{ asset('public/uploads/listing_photos/'.$row->photo) }}" class="magnific">
										<img src="{{ asset('public/uploads/listing_photos/'.$row->photo) }}" alt="">
										<div class="icon">
											<i class="fas fa-plus"></i>
										</div>
										<div class="bg"></div>
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif


					@if(!$listing_videos->isEmpty())
					<div class="sep"></div>
					<h2><i class="fas fa-video"></i> {{ VIDEOS }}</h2>
					<div class="video-all">
						<div class="row">
							@foreach($listing_videos as $row)
							<div class="col-md-6 col-lg-4">
								<div class="item">
									<a class="video-button" href="http://www.youtube.com/watch?v={{ $row->youtube_video_id }}">
										<img src="http://img.youtube.com/vi/{{ $row->youtube_video_id }}/0.jpg" alt="">
										<div class="icon">
											<i class="far fa-play-circle"></i>
										</div>
										<div class="bg"></div>
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif


					@if($detail->listing_map!='')
					<div class="sep"></div>
					<h2><i class="fas fa-map"></i> {{ LOCATION_MAP }}</h2>
					<div class="map">
						{!! $detail->listing_map !!}
					</div>
					@endif


					@if(!$listing_amenities->isEmpty())
					<div class="sep"></div>
					<h2><i class="fas fa-bullhorn"></i> {{ AMENITIES }}</h2>
					<div class="amenities">
						<ul>
							@foreach($listing_amenities as $row)
							@php
							$res = DB::table('amenities')->where('id',$row->amenity_id)->first();
							@endphp
							<li><i class="fas fa-check-square"></i> {{ $res->amenity_name }}</li>
							@endforeach
						</ul>
					</div>
					@endif


					@if(!$listing_additional_features->isEmpty())
					<div class="sep"></div>
					<h2><i class="far fa-id-card"></i> {{ ADDITIONAL_FEATURES }}</h2>
					<div class="contact">
						<div class="table-responsive">
							<table class="table table-bordered">
								@foreach($listing_additional_features as $row)
								<tr>
									<td class="w-300">{{ $row->additional_feature_name }}</td>
									<td>{{ $row->additional_feature_value }}</td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
					@endif


					<div class="sep"></div>
					<h2><i class="far fa-id-card"></i> {{ CONTACT_INFORMATION }}</h2>
					<div class="contact">
						<div class="table-responsive">
							<table class="table table-bordered">
								@if($detail->listing_address!='')
								<tr>
									<td class="w-200">{{ ADDRESS }}</td>
									<td>
										{!! clean(nl2br($detail->listing_address)) !!}
									</td>
								</tr>
								@endif

								<tr>
									<td>{{ PHONE_NUMBER }}</td>
									<td>
										{!! clean(nl2br($detail->listing_phone)) !!}
									</td>
								</tr>

								@if($detail->listing_email!='')
								<tr>
									<td>{{ EMAIL_ADDRESS }}</td>
									<td>
										{!! clean(nl2br($detail->listing_email)) !!}
									</td>
								</tr>
								@endif

								@if($detail->listing_website!='')
								<tr>
									<td>{{ WEBSITE }}</td>
									<td class="website">
										<a href="{{ $detail->listing_website }}" target="_blank">{{ $detail->listing_website }}</a>
									</td>
								</tr>
								@endif

							</table>
						</div>
					</div>

					<div class="sep"></div>
					<h2>{{ REVIEWS }} ({{ count($reviews) }})</h2>

					<div class="review-overall">
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
						</div>
						<div class="total">
							@if(count($reviews) != 0)
							    ({{ OVERALL }} {{ $overall_rating }} {{ OUT_OF_5 }})
                            @else
                                ({{ OVERALL }} 0 {{ OUT_OF_5 }})
							@endif
						</div>
					</div>


					<div class="reviews">

                        @if($reviews->isEmpty())
                        <span class="text-danger">{{ NO_REVIEW_FOUND }}</span>
                        @else
						@foreach($reviews as $item)
                            @if($item->agent_type=="Customer")
                                @php
                                    $u_detail = DB::table('users')->where('id',$item->agent_id)->first();
                                @endphp
                            @else
                                @php
                                    $u_detail = DB::table('admins')->where('id',$item->agent_id)->first();
                                @endphp
                            @endif
						<div class="row item">
							<div class="col-md-12 col-lg-2">
								<div class="photo">
									@if($u_detail->photo == '')
										<img src="{{ asset('public/uploads/user_photos/default_photo.jpg') }}" alt="">
									@else
										<img src="{{ asset('public/uploads/user_photos/'.$u_detail->photo) }}" alt="">
									@endif
								</div>
							</div>
							<div class="col-md-12 col-lg-10">
								<div class="name">
									{{ $u_detail->name }}
								</div>
								<div class="date-time">
									{{ \Carbon\Carbon::parse($u_detail->created_at)->format('d M, Y') }}
								</div>

                                <div class="score">
                                    @if($item->rating == 5)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    @elseif($item->rating == 4.5)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    @elseif($item->rating == 4)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif($item->rating == 3.5)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    @elseif($item->rating == 3)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif($item->rating == 2.5)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif($item->rating == 2)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif($item->rating == 1.5)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif($item->rating == 1)
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @endif
                                </div>
								<div class="comment">
									<p>
										{!! clean($item->review) !!}
									</p>
								</div>
							</div>
						</div>
						@endforeach

                        @endif

					</div>


					<div class="sep"></div>
					<h2>{{ WRITE_A_REVIEW }}</h2>
					<div class="review-form">

						@if($current_auth_user_id == 0)

						<a href="{{ route('customer_login') }}" class="login-to-review">{{ LOGIN_TO_REVIEW }}</a>
						@elseif($current_auth_user_id == $agent_detail->id)
                            <div class="text-danger">{{ OWN_PRODUCT_REVIEW_STOP }}</div>

                        @elseif($already_given == 1)
                            <div class="text-danger">{{ ALREADY_GIVEN_REVIEW_STOP }}</div>
                        @else
						<form action="{{ route('customer_review') }}" method="post">
							@csrf
							<input type="hidden" name="listing_id" value="{{ $detail->id }}">
							<div class="form-group">
								<label for="">{{ YOUR_RATING }}</label>
								<select name="rating" class="form-control">
									<option value="1">{{ STAR_1 }}</option>
									<option value="2">{{ STAR_2 }}</option>
									<option value="3">{{ STAR_3 }}</option>
									<option value="4">{{ STAR_4 }}</option>
									<option value="5">{{ STAR_5 }}</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">{{ YOUR_REVIEW }}</label>
								<textarea name="review" class="form-control h-100" cols="30" rows="10"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
						</form>
						@endif


					</div>


				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="listing-sidebar">

					<div class="ls-widget">
						<h2>{{ AGENT }}</h2>
						<div class="agent">
							<div class="photo">
								@if($agent_detail->photo == '')
									<img src="{{ asset('public/uploads/user_photos/default_photo.jpg') }}" alt="">
								@else
									<img src="{{ asset('public/uploads/user_photos/'.$agent_detail->photo) }}" alt="">
								@endif

							</div>
							<div class="text">
                                @if($detail->user_id == 0)
                                    @php $type = "admin"; @endphp
                                @else
                                    @php $type = "user"; @endphp
                                @endif
                                    <h3><a href="{{ route('front_listing_agent_detail',[$type,$agent_detail->id]) }}">{{ $agent_detail->name }}</a></h3>
								<h4>{{ POSTED_ON }} {{ \Carbon\Carbon::parse($detail->created_at)->format('d M, Y') }}</h4>
							</div>
						</div>
						<div class="agent-contact">
							<ul>
								<li><i class="fas fa-map-marker-alt"></i> {{ $agent_detail->address }}</li>
								<li><i class="fas fa-phone-volume"></i> {{ $agent_detail->phone }}</li>
								<li><i class="fas fa-envelope"></i> {{ $agent_detail->email }}</li>
								<li><a href="{{ $agent_detail->website }}" target="_blank"><i class="fas fa-globe"></i> {{ $agent_detail->website }}</a></li>
							</ul>
						</div>


						@if( ($agent_detail->facebook != '') ||
						($agent_detail->twitter != '') ||
						($agent_detail->linkedin != '') ||
						($agent_detail->pinterest != '') ||
						($agent_detail->youtube != '') )
						<div class="agent-social">
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

						<a href="{{ route('front_listing_agent_detail',[$type,$agent_detail->id]) }}" class="btn btn-primary btn-block agent-view-profile">{{ VIEW_PROFILE }}</a>
					</div>

                    @if($detail->listing_oh_monday != '' || $detail->listing_oh_tuesday != '' || $detail->listing_oh_wednesday != '' || $detail->listing_oh_thursday != '' || $detail->listing_oh_friday != '' || $detail->listing_oh_saturday != '' || $detail->listing_oh_sunday != '')
					<div class="ls-widget">
						<h2>{{ OPENING_HOUR }}</h2>
						<div class="openning-hour">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<td>{{ MONDAY }}</td>
										<td>{{ $detail->listing_oh_monday }}</td>
									</tr>
									<tr>
										<td>{{ TUESDAY }}</td>
										<td>{{ $detail->listing_oh_tuesday }}</td>
									</tr>
									<tr>
										<td>{{ WEDNESDAY }}</td>
										<td>{{ $detail->listing_oh_wednesday }}</td>
									</tr>
									<tr>
										<td>{{ THURSDAY }}</td>
										<td>{{ $detail->listing_oh_thursday }}</td>
									</tr>
									<tr>
										<td>{{ FRIDAY }}</td>
										<td>{{ $detail->listing_oh_friday }}</td>
									</tr>
									<tr>
										<td>{{ SATURDAY }}</td>
										<td>{{ $detail->listing_oh_saturday }}</td>
									</tr>
									<tr>
										<td>{{ SUNDAY }}</td>
										<td>{{ $detail->listing_oh_sunday }}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
                    @endif

					<div class="ls-widget">
						<h2>{{ CATEGORIES }}</h2>
						<div class="category">
							<ul>
								@foreach($listing_categories as $row)
								<li><a href="{{ route('front_listing_category_detail',$row->listing_category_slug) }}"><i class="fas fa-angle-right"></i> {{ $row->listing_category_name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="ls-widget">
						<h2>{{ LOCATIONS }}</h2>
						<div class="category">
							<ul>
								@foreach($listing_locations as $row)
								<li><a href="{{ route('front_listing_location_detail',$row->listing_location_slug) }}"><i class="fas fa-angle-right"></i> {{ $row->listing_location_name }}</a></li>
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
