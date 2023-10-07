@extends('front.app_front')

@section('content')

    <div class="page-banner">
        <h1>{{ $listing_location_page_data->name }}</h1>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                <li class="breadcrumb-item active">{{ $listing_location_page_data->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="page-content popular-city">
        <div class="container">
            <div class="row">
                @foreach($orderwise_listing_locations as $row)
                    @if($row->total == '')
                        @php $row->total = 0; @endphp
                    @endif
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="popular-city-item" style="background-image: url('{{ asset('public/uploads/listing_location_photos/'.$row->listing_location_photo) }}');">
                            <div class="bg"></div>
                            <div class="text">
                                <h4>{{ $row->listing_location_name }}</h4>
                                <p>{{ $row->total }} {{ LISTINGS }}</p>
                            </div>
                            <a href="{{ route('front_listing_location_detail',$row->listing_location_slug) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
