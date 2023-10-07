@extends('admin.app_admin')
@section('admin_content')
<?php use App\Models\kb_subcats;?>
    <h1 class="h3 mb-3 text-gray-800">Knowledge Bank Topics</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{route('add_kb_topic')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ ADD_NEW }}</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ SERIAL }}</th>
                        <th>{{ NAME }}</th>
                        <th>Category</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach($kb as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
                            <td>
                                <?php
                                $sub_cats=kb_subcats::find($row->cat_id);
                                echo $sub_cats->name;
                                ?>
                            </td>
                            <td>
                                <!-- <a href="{{route('view_kb_topic')}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a> -->
                                <a href="{{route('edit_kb_topic',$row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{route('delete_kb_topic',$row->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
