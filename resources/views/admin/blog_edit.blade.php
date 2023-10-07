@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_POST }}</h1>

    <form action="{{ route('admin_blog_update',$blog->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_photo" value="{{ $blog->post_photo }}">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_blog_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ NAME }} *</label>
                    <input type="text" name="post_title" class="form-control" value="{{ $blog->post_title }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">{{ SLUG }}</label>
                    <input type="text" name="post_slug" class="form-control" value="{{ $blog->post_slug }}">
                </div>
                <div class="form-group">
                    <label for="">{{ CONTENT }} *</label>
                    <textarea name="post_content" class="form-control editor" cols="30" rows="10">{{ $blog->post_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ SHORT_CONTENT }} *</label>
                    <textarea name="post_content_short" class="form-control h_100" cols="30" rows="10">{{ $blog->post_content_short }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ EXISTING_PHOTO }}</label>
                    <div>
                        <img src="{{ asset('public/uploads/post_photos/'.$blog->post_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ CHANGE_PHOTO }}</label>
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
                                    <option value="{{ $row->id }}" @if($row->id == $blog->category_id) selected @endif>{{ $row->category_name }}</option>
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
                                <option value="Yes" @if($blog->comment_show == 'Yes') selected @endif>{{ YES }}</option>
                                <option value="No" @if($blog->comment_show == 'No') selected @endif>{{ NO }}</option>
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
                    <input type="text" name="seo_title" class="form-control" value="{{ $blog->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">{{ META_DESCRIPTION }}</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $blog->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
            </div>
        </div>
    </form>

@endsection
