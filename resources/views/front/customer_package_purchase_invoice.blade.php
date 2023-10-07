@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ INVOICE }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item"><a href="{{ route('customer_package_purchase_history') }}">{{ PURCHASE_HISTORY }}</a></li>
			<li class="breadcrumb-item active">{{ INVOICE }}</li>
		</ol>
	</nav>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3 invoice-sidebar">
				<div class="user-sidebar">
					@include('front.customer_sidebar')
				</div>
			</div>
			<div class="col-md-9 invoice-right">

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
                                <h5>{{ INVOICED_TO }}</h5>
                                <p>{{ NAME }}: {{ $user_data->name }}</p>
                                <p>{{ EMAIL }}: {{ $user_data->email }}</p>
                                @if($detail->payment_method != null)
                                <p>{{ PAYMENT_METHOD }}: {{ $detail->payment_method }}</p>
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
                                    {{ DATE }}:
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
                                            <td>{{ $detail->rPackage->package_name }}</td>
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
