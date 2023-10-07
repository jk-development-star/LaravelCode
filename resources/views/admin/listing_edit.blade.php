@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_LISTING }}</h1>

    <form action="{{ route('admin_listing_update',$listing->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card shadow mb-4 t-left">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_listing_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1" role="tab" aria-controls="p1" aria-selected="true">{{ MAIN_SECTION }}</a>
                            <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab" aria-controls="p2" aria-selected="false">{{ OPENING_HOUR }}</a>
                            <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab" aria-controls="p3" aria-selected="false">{{ SOCIAL_MEDIA }}</a>
                            <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab" aria-controls="p4" aria-selected="false">{{ AMENITY }}</a>
                            <a class="nav-link" id="p5_tab" data-toggle="pill" href="#p5" role="tab" aria-controls="p5" aria-selected="false">{{ PHOTO_GALLERY }}</a>
                            <a class="nav-link" id="p6_tab" data-toggle="pill" href="#p6" role="tab" aria-controls="p6" aria-selected="false">{{ VIDEO_GALLERY }}</a>
                            <a class="nav-link" id="p7_tab" data-toggle="pill" href="#p7" role="tab" aria-controls="p7" aria-selected="false">{{ ADDITIONAL_FEATURES }}</a>
                            <a class="nav-link" id="p8_tab" data-toggle="pill" href="#p8" role="tab" aria-controls="p8" aria-selected="false">{{ SEO }}</a>
                            <a class="nav-link" id="p9_tab" data-toggle="pill" href="#p9" role="tab" aria-controls="p9" aria-selected="false">{{ STATUS_AND_FEATURED }}</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">

                            <!-- Tab 1 -->
                            <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="p1_tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ NAME }} *</label>
                                            <input type="text" name="listing_name" class="form-control" value="{{ $listing->listing_name }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ SLUG }}</label>
                                            <input type="text" name="listing_slug" class="form-control" value="{{ $listing->listing_slug }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ DESCRIPTION }} *</label>
                                    <textarea name="listing_description" class="form-control editor" cols="30" rows="10">{{ $listing->listing_description }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ LISTING_CATEGORY }}</label>
                                            <select name="listing_category_id" class="form-control select2">
                                                @foreach($listing_category as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $listing->listing_category_id) selected @endif>{{ $row->listing_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ LISTING_LOCATION }}</label>
                                            <select name="listing_location_id" class="form-control select2">
                                                @foreach($listing_location as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $listing->listing_location_id) selected @endif>{{ $row->listing_location_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ ADDRESS }}</label>
                                            <textarea name="listing_address" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ PHONE }} *</label>
                                            <textarea name="listing_phone" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_phone }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ EMAIL }}</label>
                                            <textarea name="listing_email" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_email }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ MAP_IFRAME_CODE }}</label>
                                            <textarea name="listing_map" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_map }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ WEBSITE }}</label>
                                    <input type="text" name="listing_website" class="form-control" value="{{ $listing->listing_website }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ EXISTING_FEATURED_PHOTO }} *</label>
                                    <div>
                                        <img src="{{ asset('public/uploads/listing_featured_photos/'.$listing->listing_featured_photo) }}" class="w_200" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ CHANGE_FEATURED_PHOTO }} *</label>
                                    <div>
                                        <input type="file" name="listing_featured_photo">
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 1 -->



                            <!-- Tab 2 -->
                            <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2_tab">

                                <h4 class="heading-in-tab">{{ OPENING_HOUR }}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ MONDAY }}</label>
                                            <input type="text" name="listing_oh_monday" class="form-control" value="{{ $listing->listing_oh_monday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ TUESDAY }}</label>
                                            <input type="text" name="listing_oh_tuesday" class="form-control" value="{{ $listing->listing_oh_tuesday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ WEDNESDAY }}</label>
                                            <input type="text" name="listing_oh_wednesday" class="form-control" value="{{ $listing->listing_oh_wednesday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ THURSDAY }}</label>
                                            <input type="text" name="listing_oh_thursday" class="form-control" value="{{ $listing->listing_oh_thursday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ FRIDAY }}</label>
                                            <input type="text" name="listing_oh_friday" class="form-control" value="{{ $listing->listing_oh_friday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ SATURDAY }}</label>
                                            <input type="text" name="listing_oh_saturday" class="form-control" value="{{ $listing->listing_oh_saturday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ SUNDAY }}</label>
                                            <input type="text" name="listing_oh_sunday" class="form-control" value="{{ $listing->listing_oh_sunday }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 2 -->



                            <!-- Tab 3 -->
                            <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="p3_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_SOCIAL_MEDIA }}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                @foreach($listing_social_items as $row)
                                                <tr>
                                                    <td>
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
                                                        <i class="{{ $icon_code }}"></i>
                                                    </td>
                                                    <td>{{ $row->social_url }}</td>
                                                    <td>
                                                        <a href="{{ route('admin_listing_delete_social_item',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <h4 class="heading-in-tab mt_30">{{ NEW_SOCIAL_MEDIA }}</h4>
                                <div class="social_item">
                                    <div class="row">
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
                                            <div class="btn btn-success add_social_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 3 -->


                            <!-- Tab 4 -->
                            <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="p4_tab">

                                <h4 class="heading-in-tab">{{ AMENITY }}</h4>
                                <div class="row">
                                    @php $i=0; @endphp
                                    @foreach($amenity as $row)
                                    @php $i++; @endphp
                                    <div class="col-md-4">
                                        <div class="form-check mb_10">
                                            <input class="form-check-input" name="amenity[]" type="checkbox" value="{{ $row->id }}" id="amenities{{ $i }}" @if(in_array($row->id,$existing_amenities_array)) checked @endif>
                                            <label class="form-check-label" for="amenities{{ $i }}">
                                                {{ $row->amenity_name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- // Tab 4 -->



                            <!-- Tab 5 -->
                            <div class="tab-pane fade" id="p5" role="tabpanel" aria-labelledby="p5_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_PHOTOS }}</h4>
                                <div class="row">
                                    @foreach($listing_photos as $row)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div>
                                                    <img src="{{ asset('public/uploads/listing_photos/'.$row->photo) }}" class="w_100_p" alt=""><br>
                                                    <a href="{{ route('admin_listing_delete_photo',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <h4 class="heading-in-tab mt_30">{{ NEW_PHOTOS }}</h4>
                                <div class="photo_item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div>
                                                    <input type="file" name="photo_list[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="btn btn-success add_photo_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 5 -->


                            <!-- Tab 6 -->
                            <div class="tab-pane fade" id="p6" role="tabpanel" aria-labelledby="p6_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_VIDEOS }}</h4>
                                <div class="row">
                                    @foreach($listing_videos as $row)
                                    <div class="col-md-4 existing-video">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $row->youtube_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <br>
                                        <a href="{{ route('admin_listing_delete_video',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                    </div>
                                    @endforeach
                                </div>

                                <h4 class="heading-in-tab mt_30">{{ NEW_VIDEOS }}</h4>
                                <div class="video_item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="youtube_video_id[]" class="form-control" placeholder="{{ YOUTUBE_VIDEO_ID }}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="btn btn-success add_video_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 6 -->


                            <!-- Tab 7 -->
                            <div class="tab-pane fade" id="p7" role="tabpanel" aria-labelledby="p7_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_ADDITIONAL_FEATURES }}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                            @foreach($listing_additional_features as $row)
                                                <tr>
                                                    <td>{{ $row->additional_feature_name }}</td>
                                                    <td>{{ $row->additional_feature_value }}</td>
                                                    <td>
                                                        <a href="{{ route('admin_listing_delete_additional_feature',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="heading-in-tab mt_30">{{ NEW_ADDITIONAL_FEATURES }}</h4>
                                <div class="additional_feature_item">
                                    <div class="row">
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
                                            <div class="btn btn-success add_additional_feature_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 7 -->


                            <!-- Tab 8 -->
                            <div class="tab-pane fade" id="p8" role="tabpanel" aria-labelledby="p8_tab">
                                <div class="form-group">
                                    <label for="">{{ TITLE }}</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $listing->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ META_DESCRIPTION }}</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $listing->seo_meta_description }}</textarea>
                                </div>
                            </div>
                            <!-- // Tab 8 -->


                            <!-- Tab 9 -->
                            <div class="tab-pane fade" id="p9" role="tabpanel" aria-labelledby="p9_tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ STATUS }}</label>
                                        <select name="listing_status" class="form-control">
                                            <option value="Active" @if($listing->listing_status=='Active') selected @endif>{{ ACTIVE }}</option>
                                            <option value="Pending" @if($listing->listing_status=='Pending') selected @endif>{{ PENDING }}</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">{{ QUESTION_IS_FEATURED }}</label>
                                            <select name="is_featured" class="form-control">
                                                <option value="Yes" @if($listing->is_featured=='Yes') selected @endif>{{ YES }}</option>
                                                <option value="No" @if($listing->is_featured=='No') selected @endif>{{ NO }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 9 -->

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-success btn-block mb_40">{{ UPDATE }}</button>
    </form>


<div class="d_n">
	<div id="add_social">
		<div class="delete_social">
			<div class="row">
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
                    <div class="btn btn-danger remove_social_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_photo">
		<div class="delete_photo">
			<div class="row">
				<div class="col-md-5">
                    <div class="form-group">
                        <div>
                            <input type="file" name="photo_list[]">
                        </div>
                    </div>
				</div>
				<div class="col-md-1">
                    <div class="btn btn-danger remove_photo_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_video">
		<div class="delete_video">
			<div class="row">
				<div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="youtube_video_id[]" class="form-control" placeholder="{{ YOUTUBE_VIDEO_ID }}">
                    </div>
				</div>
				<div class="col-md-1">
                    <div class="btn btn-danger remove_video_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_additional_feature">
		<div class="delete_additional_feature">
			<div class="row">
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
                    <div class="btn btn-danger remove_additional_feature_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection
