@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_BANNER }}</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin_banner_change_update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">{{ EXISTING_BANNER }} *</label>
                            <div>
                                <img src="{{ asset('public/uploads/user_photos/'.$admin_data->banner) }}" alt="" class="w_300">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CHANGE_BANNER }} *</label>
                            <div><input type="file" name="banner"></div>
                        </div>
                        <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>

@endsection
