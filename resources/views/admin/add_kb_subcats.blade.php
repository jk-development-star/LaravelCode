@extends('admin.app_admin')
@section('admin_content')
<?php use App\Models\knowledgecategory; ?>
    <h1 class="h3 mb-3 text-gray-800">Add Subcategory</h1>
    <form action="{{route('insert_kb_subcats')}}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('kb_subcats') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ NAME }} *</label>
                    <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}" required autofocus>
                </div>
                
                <div class="form-group">
                    <label for="">Parent Category</label>
                    <select name="cat_parent" class="form-control" >
                        <option>Select a Parent Category</option>
                        <?php
                         $cats = knowledgecategory::all();
                         for($i=0;$i<$cats->count();$i++) {
                        ?>
                    <option value="<?php echo $cats[$i]->id; ?>"><?php echo $cats[$i]->category_name; ?></option>
                <?php } ?>
                    </select>
                </div>
            </div>
           
            <div class="card-body">
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>

@endsection
