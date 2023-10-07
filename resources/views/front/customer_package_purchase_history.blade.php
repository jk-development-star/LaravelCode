@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ PURCHASE_HISTORY }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ PURCHASE_HISTORY }}</li>
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

				@if($package_purchase->isEmpty())
				<span class="text-danger">{{ NO_RESULT_FOUND }}</span>

				@else
				<div class="table-responsive-md">
					<table class="table table-bordered">
						<thead>
							<tr class="table-primary">
								<th scope="col">{{ SERIAL }}</th>
								<th scope="col">{{ PACKAGE_NAME }}</th>
								<th scope="col">{{ PACKAGE_START_DATE }}</th>
								<th scope="col">{{ PACKAGE_END_DATE }}</th>
								<th scope="col">{{ PAID_AMOUNT }}</th>
								<th scope="col" class="w-150">{{ ACTION }}</th>
							</tr>
						</thead>
						<tbody>
							@php $i=0; @endphp
                        	@foreach($package_purchase as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
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
								<td>${{ $row->paid_amount }}</td>
								<td>
									<a href="{{ route('customer_package_purchase_invoice',$row->id) }}" class="btn btn-warning btn-sm btn-block mb_5">{{ INVOICE }}</a>
									<a href="{{ route('customer_package_purchase_history_detail',$row->id) }}" class="btn btn-secondary btn-sm btn-block mb_5">{{ HISTORY_DETAIL }}</a>
									<a href="{{ route('customer_package') }}" class="btn btn-primary btn-sm btn-block">{{ PACKAGE_DETAIL }}</a>
								</td>
							</tr>
                        	@endforeach

						</tbody>
					</table>
				</div>
				@endif

			</div>
		</div>
	</div>
</div>

@endsection
