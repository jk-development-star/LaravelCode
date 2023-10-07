@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_PACKAGE }}</h1>

   <form action="{{ route('admin_package_update',$package->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                        <div class="float-right d-inline">
                            <a href="{{ route('admin_package_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ TYPE }} *</label>
                                    @if($package->package_type == 'Free')
                                        @php
                                        $free = 'selected';
                                        $paid = '';
                                        @endphp
                                    @else
                                        @php
                                        $free = '';
                                        $paid = 'selected';
                                        @endphp
                                    @endif
                                    <select name="package_type" class="form-control" id="package_type_change">
                                        <option value="">{{ SELECT_PACKAGE_TYPE }}</option>
                                        <option value="Free" {{ $free }}>{{ FREE }}</option>
                                        <option value="Paid" {{ $paid }}>{{ PAID }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ NAME }} *</label>
                                    <input type="text" name="package_name" class="form-control" value="{{ $package->package_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ PRICE }} *</label>
                                    <input type="text" name="package_price" class="form-control" id="package_price" value="{{ $package->package_price }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ VALID_NUMBER_OF_DAYS }} *</label>
                                    <input type="text" name="valid_days" class="form-control" value="{{ $package->valid_days }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ALLOWED_LISTINGS }} *</label>
                                    <input type="text" name="total_listings" class="form-control" value="{{ $package->total_listings }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ALLOWED_AMENITIES_PER_LISTING }} *</label>
                                    <input type="text" name="total_amenities" class="form-control" value="{{ $package->total_amenities }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ALLOWED_PHOTOS_PER_LISTING }} *</label>
                                    <input type="text" name="total_photos" class="form-control" value="{{ $package->total_photos }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ALLOWED_VIDEOS_PER_LISTING }} *</label>
                                    <input type="text" name="total_videos" class="form-control" value="{{ $package->total_videos }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ALLOWED_SOCIAL_ITEMS_PER_LISTING }} *</label>
                                    <input type="text" name="total_social_items" class="form-control" value="{{ $package->total_social_items }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ALLOWED_ADDITIONAL_FEATURES_PER_LISTING }} *</label>
                                    <input type="text" name="total_additional_features" class="form-control" value="{{ $package->total_additional_features }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ QUESTION_ALLOW_FEATURED_LISTING }} *</label>
                                    <select class="form-control" name="allow_featured">
                                        <option value="Yes" @if($package->allow_featured == 'Yes') selected @endif>{{ YES }}</option>
                                        <option value="No" @if($package->allow_featured == 'No') selected @endif>{{ NO }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ ORDER }}</label>
                                    <input type="text" name="package_order" class="form-control" value="{{ $package->package_order }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>



<script>
$('#package_type_change').on('change',function() {

    var pt_val = $('#package_type_change').val();
    if(pt_val == 'Free')
    {
        $('#package_price').val(0);
        $('#package_price').prop('readonly', true);
    }
    else
    {
        $('#package_price').val();
        $('#package_price').prop('readonly', false);
    }
});
</script>


@endsection