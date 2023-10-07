@extends('front.app_front')

@section('content')

<div class="page-banner">
    <h1>{{ $listing_category_page_data->name }}</h1>
    <nav>
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
            <li class="breadcrumb-item active">{{ $listing_category_page_data->name }}</li>
        </ol>
    </nav>
</div>

<div class="page-content popular-category">
    <div class="container">
        <div class="row">
            @foreach($orderwise_listing_categories as $row)
                @if($row->total == '')
                    @php $row->total = 0; @endphp
                @endif
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="popular-category-item" style="background-image: url({{ asset('public/uploads/listing_category_photos/'.$row->listing_category_photo) }});">
                        <div class="bg"></div>
                        <div class="text">
                            <h4>{{ $row->listing_category_name }}</h4>
                            <p>{{ $row->total }} {{ LISTINGS }}</p>
                        </div>
                        <a href="{{ route('front_listing_category_detail',$row->listing_category_slug) }}"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
