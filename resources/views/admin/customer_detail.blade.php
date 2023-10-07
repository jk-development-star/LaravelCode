@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ CUSTOMER_DETAIL }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admin_customer_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ BACK_TO_PREVIOUS }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>{{ PHOTO }}</td>
                                <td>
                                     @if($customer_detail->photo == '')
                                        <img src="{{ asset('public/uploads/user_photos/default_photo.jpg') }}" class="w_100">
                                    @else
                                        <img src="{{ asset('public/uploads/user_photos/'.$customer_detail->photo) }}" class="w_100">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ BANNER }}</td>
                                <td>
                                     @if($customer_detail->banner == '')
                                        <img src="{{ asset('public/uploads/user_photos/default_banner.jpg') }}" class="w_200">
                                    @else
                                        <img src="{{ asset('public/uploads/user_photos/'.$customer_detail->banner) }}" class="w_100">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ NAME }}</td>
                                <td>{{ $customer_detail->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ EMAIL }}</td>
                                <td>{{ $customer_detail->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ PHONE }}</td>
                                <td>{{ $customer_detail->phone }}</td>
                            </tr>
                            <tr>
                                <td>{{ COUNTRY }}</td>
                                <td>{{ $customer_detail->country }}</td>
                            </tr>
                            <tr>
                                <td>{{ ADDRESS }}</td>
                                <td>{{ $customer_detail->address }}</td>
                            </tr>
                            <tr>
                                <td>{{ STATE }}</td>
                                <td>{{ $customer_detail->state }}</td>
                            </tr>
                            <tr>
                                <td>{{ CITY }}</td>
                                <td>{{ $customer_detail->city }}</td>
                            </tr>
                            <tr>
                                <td>{{ ZIP }}</td>
                                <td>{{ $customer_detail->zip }}</td>
                            </tr>
                            <tr>
                                <td>{{ WEBSITE }}</td>
                                <td>{{ $customer_detail->website }}</td>
                            </tr>
                            <tr>
                                <td>{{ FACEBOOK }}</td>
                                <td>{{ $customer_detail->facebook }}</td>
                            </tr>
                            <tr>
                                <td>{{ TWITTER }}</td>
                                <td>{{ $customer_detail->twitter }}</td>
                            </tr>
                            <tr>
                                <td>{{ LINKEDIN }}</td>
                                <td>{{ $customer_detail->linkedin }}</td>
                            </tr>
                            <tr>
                                <td>{{ INSTAGRAM }}</td>
                                <td>{{ $customer_detail->instagram }}</td>
                            </tr>
                            <tr>
                                <td>{{ PINTEREST }}</td>
                                <td>{{ $customer_detail->pinterest }}</td>
                            </tr>
                            <tr>
                                <td>{{ YOUTUBE }}</td>
                                <td>{{ $customer_detail->youtube }}</td>
                            </tr>
                            <tr>
                                <td>{{ STATUS }}</td>
                                <td>{{ $customer_detail->status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection