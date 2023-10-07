@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Knowledge Bank Topics</h1>

    <form action="{{route('update_kb_topic')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('kb_topics') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$topic->id}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ TITLE }} *</label>
                    <input type="text" name="post_title" class="form-control" value="{{ $topic->title }}" autofocus>
                </div>
               
                <div class="form-group">
                    <label for="">{{ CONTENT }} *</label>
                    <textarea name="post_content" class="form-control editor" cols="30" rows="10">{{ $topic->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ PHOTO }} *</label>
                    <div>
                        <input type="file" name="post_photo">
                        <br><br><label> Current Image</label><img src="{{asset('public/kb-images/')}} <?php echo "/".$topic->featured_img; ?>" width="100">    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Select Subcategory</label>
                            <select name="category_id" class="form-control">
                                <option value=''>Select a subcategory</option>
                                @foreach($cat as $row)
                                    <option value="{{$row->id}}" <?php if($row->id == $topic->cat_id){echo "selected";} ?> >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>

@endsection