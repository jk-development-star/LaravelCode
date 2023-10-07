@extends('front.app_front')

@section('content')

<div class="page-banner">
    <h1>{{ LISTING_CATEGORY_COLON }} {{ $listing_category_detail->listing_category_name }}</h1>
    <nav>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('front_listing_category_all') }}">{{ $listing_category_page_data->name }}</a></li>
            <li class="breadcrumb-item active">{{ $listing_category_detail->listing_category_name }}</li>
        </ol>
    </nav>
</div>

<div class="page-content">
    <div class="container">
        <div class="row listing pb_0">

            @if($listing_items->isEmpty())
                <div class="text-danger">
                    {{ NO_RESULT_FOUND }}
                </div>
            @else
            @foreach($listing_items as $row)
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

                <div class="col-md-12">
                    {{ $listing_items->links() }}
                </div>

            @endif

        </div>
    </div>
</div>

@endsection
