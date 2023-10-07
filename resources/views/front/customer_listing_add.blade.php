@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ ADD_LISTING }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ ADD_LISTING }}</li>
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

				@if($listing_error_message != '')

				<span class="text-danger">{{ $listing_error_message }}</span>

				@else
				<form action="{{ route('customer_listing_add_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ LISTING_NAME }} *</label>
								<input type="text" name="listing_name" class="form-control" value="{{ old('listing_name') }}" autofocus>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ LISTING_SLUG }}</label>
								<input type="text" name="listing_slug" class="form-control" value="{{ old('listing_slug') }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ LISTING_DESCRIPTION }} *</label>
								<textarea name="listing_description" class="form-control editor" cols="30" rows="10">{{ old('listing_description') }}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ CATEGORY }}</label>
								<select name="listing_category_id" class="form-control select2">
                                    @foreach($listing_category as $row)
                                    <option value="{{ $row->id }}">{{ $row->listing_category_name }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ LOCATION }}</label>
								<select name="listing_location_id" class="form-control select2">
                                    @foreach($listing_location as $row)
                                    <option value="{{ $row->id }}">{{ $row->listing_location_name }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ ADDRESS }}</label>
								<textarea name="listing_address" class="form-control h-70" cols="30" rows="10">{{ old('listing_address') }}</textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
                                <label for="">{{ MAP_IFRAME_CODE }}</label>
                                <textarea name="listing_map" class="form-control h-70" cols="30" rows="10">{{ old('listing_map') }}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{ EMAIL_ADDRESS }} *</label>
                                <input type="text" name="listing_email" class="form-control" value="{{ old('listing_email') }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
                                <label for="">{{ PHONE_NUMBER }} *</label>
                                <input type="text" name="listing_phone" class="form-control" value="{{ old('listing_phone') }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ WEBSITE }}</label>
								<input type="text" name="listing_website" class="form-control" value="{{ old('listing_website') }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ FEATURED_PHOTO }} *</label>
								<div>
                                    <input type="file" name="listing_featured_photo">
                                </div>
							</div>
						</div>
					</div>


					<h4 class="mt_30">{{ OPENING_HOUR }}</h4>
					<div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ MONDAY }}</label>
                                <input type="text" name="listing_oh_monday" class="form-control" value="{{ old('listing_oh_monday') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ TUESDAY }}</label>
                                <input type="text" name="listing_oh_tuesday" class="form-control" value="{{ old('listing_oh_tuesday') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ WEDNESDAY }}</label>
                                <input type="text" name="listing_oh_wednesday" class="form-control" value="{{ old('listing_oh_wednesday') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ THURSDAY }}</label>
                                <input type="text" name="listing_oh_thursday" class="form-control" value="{{ old('listing_oh_thursday') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ FRIDAY }}</label>
                                <input type="text" name="listing_oh_friday" class="form-control" value="{{ old('listing_oh_friday') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ SATURDAY }}</label>
                                <input type="text" name="listing_oh_saturday" class="form-control" value="{{ old('listing_oh_saturday') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ SUNDAY }}</label>
                                <input type="text" name="listing_oh_sunday" class="form-control" value="{{ old('listing_oh_sunday') }}">
                            </div>
                        </div>
                    </div>


					<h4 class="mt_30">{{ SOCIAL_MEDIA }}
						<div class="limit">(Allowed={{ $total_social_items }})</div>
					</h4>
					<div class="social_item">
						<div class="row social_for_count">
							<div class="col-md-5">
								<div class="form-group">
									<select name="social_icon[]" class="form-control">
										<option value="Facebook">{{ FACEBOOK }}</option>
										<option value="Twitter">{{ TWITTER }}</option>
										<option value="LinkedIn">{{ LINKEDIN }}</option>
										<option value="YouTube">{{ YOUTUBE }}</option>
										<option value="Pinterest">{{ PINTEREST }}</option>
										<option value="GooglePlus">{{ GOOGLE_PLUS }}</option>
										<option value="Instagram">{{ INSTAGRAM }}</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="social_url[]" class="form-control" placeholder="{{ URL }}">
								</div>
							</div>
							<div class="col-md-1">
								<span class="btn btn-success add_social_more"><i class="fas fa-plus"></i></span>
							</div>
						</div>
					</div>

					<h4 class="mt_30">{{ AMENITIES }}
						<div class="limit">({{ ALLOWED_EQUAL }}{{ $total_amenities }})</div>
					</h4>
					<div class="row">
                        @php $i=0; @endphp
                        @foreach($amenity as $row)
                        @php $i++; @endphp
                        <div class="col-md-4">
                            <div class="form-check mb_10">
                                <input class="form-check-input amenity_check" name="amenity[]" type="checkbox" value="{{ $row->id }}" id="amenities{{ $i }}">
                                <label class="form-check-label" for="amenities{{ $i }}">
                                    {{ $row->amenity_name }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>

					<h4 class="mt_30">{{ PHOTOS }}
						<div class="limit">({{ ALLOWED_EQUAL }}{{ $total_photos }})</div>
					</h4>
					<div class="photo_item">
						<div class="row photo_for_count">
							<div class="col-md-5">
								<div class="form-group">
									<input type="file" name="photo_list[]">
								</div>
							</div>
							<div class="col-md-1">
								<span class="btn btn-success add_photo_more"><i class="fas fa-plus"></i></span>
							</div>
						</div>
					</div>

					<h4 class="mt_30">{{ VIDEOS }}
						<div class="limit">({{ ALLOWED_EQUAL }}{{ $total_videos }})</div>
					</h4>
					<div class="video_item">
						<div class="row video_for_count">
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" name="youtube_video_id[]" class="form-control" placeholder="{{ YOUTUBE_VIDEO_ID }}">
								</div>
							</div>
							<div class="col-md-1">
								<span class="btn btn-success add_video_more"><i class="fas fa-plus"></i></span>
							</div>
						</div>
					</div>


					<h4 class="mt_30">{{ ADDITIONAL_FEATURES }}
						<div class="limit">({{ ALLOWED_EQUAL }}{{ $total_additional_features }})</div>
					</h4>
					<div class="additional_feature_item">
						<div class="row additional_feature_for_count">
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" name="additional_feature_name[]" class="form-control" placeholder="{{ NAME }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="additional_feature_value[]" class="form-control" placeholder="{{ VALUE }}">
								</div>
							</div>
							<div class="col-md-1">
								<span class="btn btn-success add_additional_feature_more"><i class="fas fa-plus"></i></span>
							</div>
						</div>
					</div>

					<h4 class="mt_30">{{ SEO_SECTION }}</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ TITLE }}</label>
								<input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{ META_DESCRIPTION }}</label>
								<textarea name="seo_meta_description" class="form-control h-70" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
							</div>
						</div>
					</div>

                    @if($allow_featured == 'Yes')
                    <h4 class="mt_30">{{ QUESTION_FEATURED }}</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="is_featured" class="form-control">
                                    <option value="Yes">{{ YES }}</option>
                                    <option value="No">{{ NO }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif

					<button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
				</form>

				@endif

			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_social">
		<div class="delete_social">
			<div class="row social_for_count">
				<div class="col-md-5">
					<div class="form-group">
						<select name="social_icon[]" class="form-control">
							<option value="Facebook">{{ FACEBOOK }}</option>
							<option value="Twitter">{{ TWITTER }}</option>
							<option value="LinkedIn">{{ LINKEDIN }}</option>
							<option value="YouTube">{{ YOUTUBE }}</option>
							<option value="Pinterest">{{ PINTEREST }}</option>
							<option value="GooglePlus">{{ GOOGLE_PLUS }}</option>
							<option value="Instagram">{{ INSTAGRAM }}</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="social_url[]" class="form-control" placeholder="{{ URL }}">
					</div>
				</div>
				<div class="col-md-1">
					<span class="btn btn-danger remove_social_more"><i class="fas fa-minus"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="d_n">
	<div id="add_photo">
		<div class="delete_photo">
			<div class="row photo_for_count">
				<div class="col-md-5">
					<div class="form-group">
						<input type="file" name="photo_list[]">
					</div>
				</div>
				<div class="col-md-1">
					<span class="btn btn-danger remove_photo_more"><i class="fas fa-minus"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="d_n">
	<div id="add_video">
		<div class="delete_video">
			<div class="row video_for_count">
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" name="youtube_video_id[]" class="form-control" placeholder="{{ YOUTUBE_VIDEO_ID }}">
					</div>
				</div>
				<div class="col-md-1">
					<span class="btn btn-danger remove_video_more"><i class="fas fa-minus"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="d_n">
	<div id="add_additional_feature">
		<div class="delete_additional_feature">
			<div class="row additional_feature_for_count">
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" name="additional_feature_name[]" class="form-control" placeholder="{{ NAME }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="additional_feature_value[]" class="form-control" placeholder="{{ VALUE }}">
					</div>
				</div>
				<div class="col-md-1">
					<span class="btn btn-danger remove_additional_feature_more"><i class="fas fa-minus"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
function countElements(class_name) {
    var numItems = $('.'+class_name).length
    return numItems;
}

// Social Item Check
$(document).on("click",".add_social_more",function() {
	if(countElements('social_for_count') > {{ $total_social_items }}) {
		toastr.error('{{ MAX_ALLOWED_SOCIAL_ITEMS_FOR_YOU }} {{ $total_social_items }}')
	} else {
		var add_social = $("#add_social").html();
  		$(this).closest(".social_item").append(add_social);
	}
});
$(document).on("click",".remove_social_more",function(event){
	$(this).closest(".delete_social").remove();
});


// Photo Check
$(document).on("click",".add_photo_more",function() {
	if(countElements('photo_for_count') > {{ $total_photos }}) {
		toastr.error('{{ MAX_ALLOWED_PHOTOS_FOR_YOU }} {{ $total_photos }}')
	} else {
		var add_photo = $("#add_photo").html();
  		$(this).closest(".photo_item").append(add_photo);
	}
});
$(document).on("click",".remove_photo_more",function(event){
	$(this).closest(".delete_photo").remove();
});


// Video Check
$(document).on("click",".add_video_more",function() {
	if(countElements('video_for_count') > {{ $total_videos }}) {
		toastr.error('{{ MAX_ALLOWED_VIDEOS_FOR_YOU }} {{ $total_videos }}')
	} else {
		var add_video = $("#add_video").html();
  		$(this).closest(".video_item").append(add_video);
	}
});
$(document).on("click",".remove_video_more",function(event){
	$(this).closest(".delete_video").remove();
});


// Additional Feature
$(document).on("click",".add_additional_feature_more",function() {
	if(countElements('additional_feature_for_count') > {{ $total_additional_features }}) {
		toastr.error('{{ MAX_ALLOWED_ADDITIONAL_FEATURES_FOR_YOU }} {{ $total_additional_features }}')
	} else {
		var add_additional_feature = $("#add_additional_feature").html();
  		$(this).closest(".additional_feature_item").append(add_additional_feature);
	}
});
$(document).on("click",".remove_additional_feature_more",function(event){
	$(this).closest(".delete_additional_feature").remove();
});


// Amenities
$('.amenity_check').on('click',function() {
  	if(this.checked) {
    	var total = $("input[name='amenity[]']:checked").length;
    	if(total > {{ $total_amenities }})
    	{
    		$(this).prop("checked", false);
    		toastr.error('{{ MAX_ALLOWED_AMENITIES_FOR_YOU }} {{ $total_amenities }}')
    	}
  	}
});
</script>

@endsection
