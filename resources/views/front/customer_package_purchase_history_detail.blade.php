@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ PURCHASE_HISTORY_DETAIL }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item"><a href="{{ route('customer_package_purchase_history') }}">{{ PURCHASE_HISTORY }}</a></li>
			<li class="breadcrumb-item active">{{ PURCHASE_HISTORY_DETAIL }}</li>
		</ol>
	</nav>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="user-sidebar">
					@include('front.customer_sidebar')
				</div>
			</div>
			<div class="col-md-9">


				<div class="table-responsive-md">
					<table class="table table-bordered">
						<tr>
							<td class="w-300">{{ PACKAGE_NAME }}</td>
							<td>{{ $detail->rPackage->package_name }}</td>
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

				<a href="{{ route('customer_package_purchase_history') }}">{{ BACK_TO_PREVIOUS }}</a>


			</div>
		</div>
	</div>
</div>

@endsection
