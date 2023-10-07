@extends('front.app_front')

@section('content')

    <div class="page-banner">
        <h1>{{ WISHLIST }}</h1>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                <li class="breadcrumb-item active">{{ WISHLIST }}</li>
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

                    @if($wishlist->isEmpty())
                        <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                    @else

                        <div class="table-responsive-md">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">{{ SERIAL }}</th>
                                    <th scope="col">{{ FEATURED_PHOTO }}</th>
                                    <th scope="col">{{ NAME }}</th>
                                    <th scope="col" class="w-150">{{ ACTION }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=0; @endphp
                                @foreach($wishlist as $row)
                                    @php
                                        $listing_detail = \App\Models\Listing::where('id', $row->listing_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('public/uploads/listing_featured_photos/'.$listing_detail->listing_featured_photo) }}" alt="" class="w-200">
                                        </td>
                                        <td>
                                            {{ $listing_detail->listing_name }}<br>
                                            <a href="{{ route('front_listing_detail', $listing_detail->listing_slug) }}" class="badge badge-primary" target="_blank">{{ SEE_DETAIL }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('customer_wishlist_delete',$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $wishlist->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
