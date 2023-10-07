@extends('front.app_front')

@section('content')

    <div class="page-banner">
        <h1>{{ MY_REVIEWS }}</h1>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                <li class="breadcrumb-item active">{{ MY_REVIEWS }}</li>
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

                    @if($reviews->isEmpty())
                        <span class="text-danger">{{ NO_RESULT_FOUND }}</span>
                    @else

                        <div class="table-responsive-md">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">{{ SERIAL }}</th>
                                    <th scope="col">{{ NAME }}</th>
                                    <th scope="col">{{ RATING }}</th>
                                    <th scope="col" class="w-200">{{ REVIEW }}</th>
                                    <th scope="col" class="w-150">{{ ACTION }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=0; @endphp
                                @foreach($reviews as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @php
                                            $listing_detail = \App\Models\Listing::where('id', $row->listing_id)->first();
                                            @endphp
                                            {{ $listing_detail->listing_name }}<br>
                                            <a href="{{ route('front_listing_detail', $listing_detail->listing_slug) }}" class="badge badge-primary" target="_blank">{{ SEE_DETAIL }}</a>
                                        </td>
                                        <td>
                                            <div class="my-review">
                                                @if($row->rating == 5)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                @elseif($row->rating == 4.5)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                @elseif($row->rating == 4)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif($row->rating == 3.5)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif($row->rating == 3)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif($row->rating == 2.5)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif($row->rating == 2)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif($row->rating == 1.5)
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif($row->rating == 1)
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $row->review }}</td>
                                        <td>
                                            <a href="{{ route('customer_my_review_edit',$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                            <a href="{{ route('customer_my_review_delete',$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $reviews->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
