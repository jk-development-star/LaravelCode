@extends('front.app_front')

@section('content')
<?php 
use App\Models\slider_images; 
$images = slider_images::all();
$images_count = slider_images::all()->count();
use App\Models\knowledgecategory;
$kb_categories =knowledgecategory::all();
$kb_categories_count =knowledgecategory::all()->count();
use App\Models\kb_subcats;
// dd($images_count);
?>
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    /height: 100%;/
  }
  </style>
<!-- slider starts -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	<?php for($j=0;$j<$images_count; $j++){ ?>
    <div class="carousel-item <?php if($j==0){ echo 'active' ;}?>">
      <img src="{{asset('public/slider-images/')}}<?php echo "/".$images[$j]->name;?>" alt="Slider Image" width="1100" height="500">
      <div class="carousel-caption">
        <h3 style="color:#e00445 !important;">{{$images[$j]->caption}}</h3>
      </div>   
    </div>
    <?php } ?>
  </div>
  <a class=" carousel-control-prev"  href="#demo" data-slide="prev">
    <span class="fa fa-chevron-left fa-4x " style="color:#e00445 !important;"></span>
  </a>
  <a class=" carousel-control-next" href="#demo" data-slide="next">
     <span class="fa fa-chevron-right fa-4x " style="color:#e00445 !important;"></span>
  </a>
</div>
<div class="popular-category">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            @php $j=0;  @endphp
            @foreach($kb_categories as $row)
                @php $j++; @endphp
                @if($j>$kb_categories_count)
                    echo "No categories Found!!";
                    @break;
                @endif
                
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="popular-category-item" style='background-image: url("{{ asset('public/kb-images/'.$row->category_img) }} ");'>
                        <div class="bg"></div>
                        <div class="text">
                            <h4>{{ $row->category_name }}</h4>
                        </div>
                        <a href="{{ route('kb_cat_view',$row->id) }}"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Knowledge Bank Categories -->

@if($page_home_items->listing_status == 'Show')
<div class="listing">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2>{{ $page_home_items->listing_heading }}</h2>
					<h3>{{ $page_home_items->listing_subheading }}</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="listing-carousel owl-carousel">

					@foreach($listings as $row)
					<div class="listing-item">
						<div class="photo">
							<a href="{{ route('front_listing_detail',$row->listing_slug) }}"><img src="{{ asset('public/uploads/listing_featured_photos/'.$row->listing_featured_photo) }}" alt=""></a>
							<div class="category">
								<a href="{{ route('front_listing_category_detail',$row->rListingCategory->listing_category_slug) }}">{{ $row->rListingCategory->listing_category_name }}</a>
							</div>
							<div class="wishlist">
								<a href="{{ route('front_add_wishlist',$row->id) }}"><i class="fas fa-heart"></i></a>
							</div>
                            <div class="featured-text">{{ FEATURED }}</div>
						</div>
						<div class="text">
							<h3><a href="{{ route('front_listing_detail',$row->listing_slug) }}">{{ $row->listing_name }}</a></h3>
							<div class="location">
								<i class="fas fa-map-marker-alt"></i> {{ $row->rListingLocation->listing_location_name }}
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
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endif


@if($page_home_items->location_status == 'Show')
<div class="popular-city">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2>{{ $page_home_items->location_heading }}</h2>
					<h3>{{ $page_home_items->location_subheading }}</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="popular-city-carousel owl-carousel">
                    @php $i=0; @endphp
					@foreach($orderwise_listing_locations as $row)
                    @php $i++; @endphp
                    @if($i>$page_home_items->location_total)
                        @break;
                    @endif
					@if($row->total == '')
	        		@php $row->total = 0; @endphp
	        		@endif
					<div class="popular-city-item" style="background-image: url('{{ asset('public/uploads/listing_location_photos/'.$row->listing_location_photo) }}');">
						<div class="bg"></div>
						<div class="text">
							<h4>{{ $row->listing_location_name }}</h4>
							<p>{{ $row->total }} {{ LISTINGS }}</p>
						</div>
						<a href="{{ route('front_listing_location_detail',$row->listing_location_slug) }}"></a>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</div>
</div>
@endif

@endsection