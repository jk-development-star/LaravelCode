@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ DASHBOARD }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ DASHBOARD }}</li>
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

				<div class="row">
					<div class="col-md-6">
						<div class="dashboard-box dashboard-box-1">
							<div class="text">{{ ACTIVE_LISTING_ITEMS }}</div>
							<div class="number">{{ $total_active_listing }}</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="dashboard-box dashboard-box-2">
							<div class="text">{{ PENDING_LISTING_ITEMS }}</div>
							<div class="number">{{ $total_pending_listing }}</div>
						</div>
					</div>

					@if(!$detail == null)
					<div class="col-md-12">
						<div class="dashboard-box dashboard-box-3">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<td class="w-300">{{ ACTIVE_PACKAGE_NAME }}</td>
										<td>{{ $detail->rPackage->package_name }}</td>
									</tr>
									<tr>
										<td>{{ PACKAGE_START_DATE }}</td>
										<td>
											@php
											$good_format = date('d F, Y', strtotime($detail->package_start_date));
											@endphp
											{{ $good_format }}
										</td>
									</tr>
									<tr>
										<td>{{ PACKAGE_END_DATE }}</td>
										<td>
											@php
											$good_format = date('d F, Y', strtotime($detail->package_end_date));
											@endphp
											{{ $good_format }}
										</td>
									</tr>
									<tr>
										<td>{{ LISTING_ALLOWED }}</td>
										<td>
											{{ $detail->rPackage->total_listings }}
										</td>
									</tr>
									<tr>
										<td>{{ DAYS_REMAINING }}</td>
										<td>
											@php
											$dt1 = strtotime(date('Y-m-d'));
											$dt2 = strtotime($detail->package_end_date);
											$final_days = (int)(($dt2 - $dt1)/86400);
											@endphp

											@if($final_days < 0)
											<span class="badge badge-danger">{{ EXPIRED }}</span>
											@else
											{{ $final_days }}
											@endif
										</td>
									</tr>
									<tr>
										<td>{{ QUESTION_FEATURED_LISTING_ALLOWED }}</td>
										<td>
											{{ $detail->rPackage->allow_featured }}
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					@endif


				</div>

			</div>
		</div>
	</div>
</div>

@endsection
