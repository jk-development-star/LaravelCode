@extends('front.app_front')

@section('content')

    <div class="page-banner">
        <h1>{{ EDIT_REVIEW }}</h1>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                <li class="breadcrumb-item active">{{ EDIT_REVIEW }}</li>
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

                    <form action="{{ route('customer_my_review_update',$review_single->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ RATING }}</label>
                                    <select name="rating" class="form-control">
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{ $i }}" @if($review_single->rating == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ REVIEW }}</label>
                                    <textarea name="review" class="form-control h-100" cols="30" rows="10">{{ $review_single->review }}</textarea>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">{{ UPDATE }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
