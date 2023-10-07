@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ PURCHASE_HISTORY }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ SERIAL }}</th>
                        <th>{{ CUSTOMER_NAME }}</th>
                        <th>{{ PACKAGE_NAME }}</th>
                        <th>{{ PACKAGE_START_DATE }}</th>
                        <th>{{ PACKAGE_END_DATE }}</th>
                        <th>{{ PAID_AMOUNT }}</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                            @foreach($purchase_history as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $row->rUser->name }}
                                    <br><a href="{{ route('admin_customer_detail',$row->user_id) }}" class="badge badge-success" target="_blank">{{ SEE_DETAIL}}</a>
                                </td>
                                <td>
                                    {{ $row->rPackage->package_name }}
                                    @if($row->currently_active == 1)
                                    <br><span class="badge badge-primary">{{ CURRENTLY_ACTIVE }}</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                    $good_format = date('d F, Y', strtotime($row->package_start_date));
                                    @endphp
                                    {{ $good_format }}
                                </td>
                                <td>
                                    @php
                                    $good_format = date('d F, Y', strtotime($row->package_end_date));
                                    @endphp
                                    {{ $good_format }}
                                </td>
                                <td>${{ number_format($row->paid_amount,2) }}</td>
                                <td>
                                    <a href="{{ route('admin_purchase_history_invoice',$row->id) }}" class="btn btn-warning btn-sm btn-block mb_5">{{ INVOICE }}</a>
                                    <a href="{{ route('admin_purchase_history_detail',$row->id) }}" class="btn btn-secondary btn-sm btn-block mb_5">{{ HISTORY_DETAIL }}</a>
                                    <a href="{{ route('front_pricing') }}" class="btn btn-primary btn-sm btn-block" target="_blank">{{ PACKAGE_DETAIL }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
