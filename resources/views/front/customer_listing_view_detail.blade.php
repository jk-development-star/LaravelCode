@extends('front.app_front')

@section('content')

    <div class="page-banner">
        <h1>{{ LISTING_DETAIL }}</h1>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                <li class="breadcrumb-item active">{{ LISTING_DETAIL }}</li>
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


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ LISTING_NAME }}</b></label>
                                    <div>
                                        {{ $listing->listing_name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ LISTING_SLUG }}</b></label>
                                    <div>
                                        {{ $listing->listing_slug }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ LISTING_DESCRIPTION }}</b></label>
                                    <div>
                                        {!!  clean($listing->listing_description) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""><b>{{ CATEGORY }}</b></label>
                                    <div>
                                        {{ $listing->rListingCategory->listing_category_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""><b>{{ LOCATION }}</b></label>
                                    <div>
                                        {{ $listing->rListingLocation->listing_location_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""><b>{{ PHONE_NUMBER }}</b></label>
                                    <div>
                                        {{ $listing->listing_phone }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""><b>{{ EMAIL_ADDRESS }}</b></label>
                                    <div>
                                        {{ $listing->listing_email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ ADDRESS }}</b></label>
                                    <div>
                                        {!! clean(nl2br($listing->listing_address)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ MAP_IFRAME_CODE }}</b></label>
                                    <div class="map-area">
                                        {!! $listing->listing_map !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ WEBSITE }}</b></label>
                                    <div class="website-rtl">
                                        <a href="{{ $listing->listing_website }}" target="_blank">{{ $listing->listing_website }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>{{ FEATURED_PHOTO }}</b></label>
                                    <div>
                                        <img src="{{ asset('public/uploads/listing_featured_photos/'.$listing->listing_featured_photo) }}" class="w-200" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt_30">{{ OPENING_HOUR }}</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ MONDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_monday }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ TUESDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_tuesday }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ WEDNESDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_wednesday }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ THURSDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_thursday }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ FRIDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_friday }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ SATURDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_saturday }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>{{ SUNDAY }}</b></label>
                                    <div>
                                        {{ $listing->listing_oh_sunday }}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4 class="mt_30"><b>{{ SOCIAL_MEDIA }}</b></h4>
                        <div class="row">

                            @if($listing_social_items->isEmpty())
                                <div class="col-md-12">
                                    <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                                </div>
                            @else
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
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endif

                        </div>



                        <h4 class="mt_30">{{ AMENITIES }}</h4>
                        <div class="row pl_30">
                            @if($amenity->isEmpty())
                                <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                            @else
                            <ol>
                            @php $i=0; @endphp
                            @foreach($amenity as $row)
                                @php $i++; @endphp
                                @if(in_array($row->id,$existing_amenities_array))
                                <li>
                                    {{ $row->amenity_name }}
                                </li>
                                @endif
                            @endforeach
                            </ol>
                            @endif
                        </div>


                        <h4 class="mt_30">{{ PHOTOS }}</h4>
                        <div class="row">
                            @if($listing_photos->isEmpty())
                                <div class="col-md-12">
                                    <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                                </div>
                            @else
                                @foreach($listing_photos as $row)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div>
                                                <img src="{{ asset('public/uploads/listing_photos/'.$row->photo) }}" class="w-100-p listing-photo-item" alt="">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>



                        <h4 class="mt_30">{{ VIDEOS }}</h4>
                        <div class="row">
                            @if($listing_videos->isEmpty())
                                <div class="col-md-12">
                                    <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                                </div>
                            @else
                                @foreach($listing_videos as $row)
                                    <div class="col-md-4 existing-video">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $row->youtube_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            @endif
                        </div>



                        <h4 class="mt_30">{{ ADDITIONAL_FEATURES }}</h4>
                        <div class="row">
                            @if($listing_additional_features->isEmpty())
                                <div class="col-md-12">
                                    <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            @foreach($listing_additional_features as $row)
                                                <tr>
                                                    <td>{{ $row->additional_feature_name }}</td>
                                                    <td>{{ $row->additional_feature_value }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>


                </div>
            </div>
        </div>
    </div>


@endsection
