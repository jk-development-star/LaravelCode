@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_PHOTO }}</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin_photo_change_update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">{{ EXISTING_PHOTO }} *</label>
                            <div>
                                <img src="{{ asset('public/uploads/user_photos/'.$admin_data->photo) }}" alt="" class="w_150">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CHANGE_PHOTO }} *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>

@endsection