@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ PURCHASE_HISTORY_DETAIL }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admin_purchase_history_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ BACK_TO_PREVIOUS }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                            <td class="w-300">{{ PACKAGE_NAME }}</td>
                            <td>{{ $detail->package_name }}</td>
                        </tr>
                        <tr>
                            <td>{{ TRANSACTION_ID }}</td>
                            <td>
                                @if($detail->transaction_id == '')
                                {{ NOT_APPLICABLE }}
                                @else
                                {{ $detail->transaction_id }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ PACKAGE_PRICE }}</td>
                            <td>${{ $detail->paid_amount }}</td>
                        </tr>
                        <tr>
                            <td>{{ PAYMENT_METHOD }}</td>
                            <td>
                                @if($detail->payment_method == '')
                                {{ NOT_APPLICABLE }}
                                @else
                                {{ $detail->payment_method }}
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td>{{ PAYMENT_STATUS }}</td>
                            <td>{{ $detail->payment_status }}</td>
                        </tr>
                        <tr>
                            <td>{{ PACKAGE_START_DATE }}</td>
                            <td>{{ $detail->package_start_date }}</td>
                        </tr>
                        <tr>
                            <td>{{ PACKAGE_END_DATE }}</td>
                            <td>{{ $detail->package_end_date }}</td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection