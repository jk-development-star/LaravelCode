@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800 invoice-heading">{{ PURCHASE_INVOICE }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-5">
                                    <span>
                                        <img src="{{ asset('public/uploads/site_photos/'.$g_setting->logo) }}" alt="" class="h_70">
                                    </span>
                                </div>
                                <div class="iv-right col-7 text-md-right">
                                    <div>
                                        <span>
                                            {{ INVOICE_NO }}: {{ $detail->id }}</span>
                                        <div class="mt_10">
                                            <a href="javascript:window.print();" class="btn btn-info btn-sm mr_5 print-invoice-button">{{ PRINT_INVOICE }}</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="invoice-address">
                                    <h5>{{ INVOICE_TO }}</h5>
                                    <p>{{ NAME }}: {{ $detail->name }}</p>
                                    <p>{{ EMAIL }}: {{ $detail->email }}</p>
                                    @if($detail->payment_method != '')
                                    <p>{{ PAYMENT_METHOD}}: {{ $detail->payment_method }}</p>
                                    @endif
                                    <p>{{ PAYMENT_STATUS }}: {{ $detail->payment_status }}</p>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3 text-md-right">
                                <ul class="invoice-address">
                                    <h5>{{ INVOICE_DATE }}</h5>
                                    <p>
                                        Date: 
                                        {{ \Carbon\Carbon::parse($detail->package_start_date)->format('d M, Y') }}
                                    </p>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt_30">
                            <div class="col-md-12">
                                <div class="table-responsive invoice-table">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>{{ PACKAGE_NAME }}</b></th>
                                                <th><b>{{ PACKAGE_START_DATE }}</b></th>
                                                <th><b>{{ PACKAGE_END_DATE }}</b></th>
                                                <th class="text-right"><b>{{ SUBTOTAL }}</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $detail->package_name }}</td>
                                                <td>{{ $detail->package_start_date }}</td>
                                                <td>{{ $detail->package_end_date }}</td>
                                                <td class="text-right">${{ number_format($detail->paid_amount,2) }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="text-right">
                                            <tr>
                                                <td colspan="3">{{ TOTAL_PRICE }}: </td>
                                                <td>${{ number_format($detail->paid_amount,2) }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection