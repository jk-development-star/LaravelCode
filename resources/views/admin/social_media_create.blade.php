@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ ADD_SOCIAL_MEDIA_ITEM }}</h1>

    <form action="{{ route('admin_social_media_store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_social_media_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">{{ URL }} *</label>
                            <input type="text" name="social_url" class="form-control" value="{{ old('social_url') }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">{{ ICON_FONT_AWESOME_5_CODE }} *</label>
                            <input type="text" name="social_icon" class="form-control" value="{{ old('social_icon') }}">
                            <div class="text-danger">{{ EXAMPLE }}: "fab fa-facebook-f"</div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ ORDER }}</label>
                            <input type="text" name="social_order" class="form-control" value="{{ old('social_order', '0') }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>

@endsection