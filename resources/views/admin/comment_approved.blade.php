@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ APPROVED_COMMENTS }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ SERIAL }}</th>
                        <th>{{ NAME_AND_EMAIL }}</th>
                        <th>{{ COMMENT }}</th>
                        <th>{{ BLOG_TITLE }}</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments_approved as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->person_name }} <br>{{ $row->person_email }}</td>
                            <td>{{ $row->person_comment }}</td>
                            <td>
                                {{ $row->post_title }}<br>
                                <a href="{{ route('front_post',$row->post_slug) }}" class="btn btn-primary btn-sm" target="_blank">{{ SEE_BLOG }}</a>
                            </td>
                            <td>
                                <a href="{{ route('admin_comment_make_pending',$row->id) }}" class="btn btn-warning btn-sm btn-block" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ MAKE_PENDING }}</a>
                                <a href="{{ route('admin_comment_delete',$row->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
