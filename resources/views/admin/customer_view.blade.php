@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ CUSTOMERS }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ SERIAL }}</th>
                        <th>{{ PHOTO }}</th>
                        <th>{{ NAME }}</th>
                        <th>{{ EMAIL }}</th>
                        <th>{{ STATUS }}</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($row->photo == '')
                                    <img src="{{ asset('public/uploads/user_photos/default_photo.jpg') }}" class="w_100">
                                @else
                                    <img src="{{ asset('public/uploads/user_photos/'.$row->photo) }}" class="w_100">
                                @endif
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                @if ($row->status == 'Active')
                                <a href="" onclick="customerStatus({{ $row->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Pending" data-onstyle="success" data-offstyle="danger"></a>
                                @else
                                    <a href="" onclick="customerStatus({{ $row->id }})"><input type="checkbox" data-toggle="toggle" data-on="Active" data-off="Pending" data-onstyle="success" data-offstyle="danger"></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin_customer_detail',$row->id) }}" class="btn btn-info btn-sm btn-block">{{ DETAIL }}</a>
                                <a href="{{ route('admin_customer_delete',$row->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function customerStatus(id){
            $.ajax({
                type:"get",
                url:"{{url('/admin/customer-status/')}}"+"/"+id,
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){
                    console.log(err);
                }
            })
        }
    </script>
@endsection
