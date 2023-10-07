@extends('admin.app_admin')
@section('admin_content')
<?php use App\Models\kb_subcats;?>
    <h1 class="h3 mb-3 text-gray-800">Home Slider Images</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{route('add_slider_image')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ ADD_NEW }}</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ SERIAL }}</th>
                        <th>Image</th>
                        <th>Caption</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach($slider_images as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{asset('public/slider-images')}} <?php echo "/".$row->name; ?>" width="100"></td>
                            <td>{{ $row->caption }}</td>
                            
                            <td>
                                <a href="{{route('delete_slider_image',$row->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
