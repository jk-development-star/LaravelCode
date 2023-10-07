@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_PASSWORD }}</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin_password_change_update') }}" method="post">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">{{ NEW_PASSWORD }} *</label>
                            <input type="password" name="password" class="form-control" value="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">{{ RETYPE_PASSWORD }} *</label>
                            <input type="password" name="re_password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>

@endsection
