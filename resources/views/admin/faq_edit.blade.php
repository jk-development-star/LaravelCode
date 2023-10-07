@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_FAQ }}</h1>

    <form action="{{ route('admin_faq_update',$faq->id) }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_faq_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">{{ TITLE }} *</label>
                            <input type="text" name="faq_title" class="form-control" value="{{ $faq->faq_title }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CONTENT }} *</label>
                            <textarea name="faq_content" class="form-control editor" cols="30" rows="10">{{ $faq->faq_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">{{ ORDER }}</label>
                            <input type="text" name="faq_order" class="form-control" value="{{ $faq->faq_order }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
            </div>
        </div>
    </form>

@endsection
