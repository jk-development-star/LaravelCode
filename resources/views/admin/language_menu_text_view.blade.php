@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ LANGUAGE_MENU_TEXT }}</h1>

    <form action="{{ route('admin_language_menu_text_update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary">{{ SETUP_KEY_VALUES }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>{{ KEY }}</th>
                                    <th>{{ VALUE }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($language_data as $row)
                                    <input type="hidden" name="lang_id[]" value="{{ $row->id }}">
                                    <input type="hidden" name="lang_key[]" value="{{ $row->lang_key }}">
                                    <tr>
                                        <td>
                                            <input type="text" name="" class="form-control" value="{{ $row->lang_key }}" disabled>
                                        </td>
                                        <td>
                                            <input type="text" name="lang_value[]" class="form-control" value="{{ $row->lang_value }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">{{ UPDATE }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
