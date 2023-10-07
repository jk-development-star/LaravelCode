@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ ADD_POST }}</h1>

    <form action="{{ route('admin_blog_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_blog_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ TITLE }} *</label>
                    <input type="text" name="post_title" class="form-control" value="{{ old('post_title') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">{{ SLUG }}</label>
                    <input type="text" name="post_slug" class="form-control" value="{{ old('post_slug') }}">
                </div>
                <div class="form-group">
                    <label for="">{{ CONTENT }} *</label>
                    <textarea name="post_content" class="form-control editor" cols="30" rows="10">{{ old('post_content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ SHORT_CONTENT }} *</label>
                    <textarea name="post_content_short" class="form-control h_100" cols="30" rows="10">{{ old('post_content_short') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ PHOTO }} *</label>
                    <div>
                        <input type="file" name="post_photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">{{ SELECT_CATEGORY }} *</label>
                            <select name="category_id" class="form-control">
                                @foreach($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">{{ QUESTION_SHOW_COMMENT }} *</label>
                            <select name="comment_show" class="form-control">
                                <option value="Yes">{{ YES }}</option>
                                <option value="No">{{ NO }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ SEO_INFORMATION }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ TITLE }}</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>
                <div class="form-group">
                    <label for="">{{ META_DESCRIPTION }}</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>

@endsection
