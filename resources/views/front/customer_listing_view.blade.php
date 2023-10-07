@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ ALL_LISTINGS }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ ALL_LISTINGS }}</li>
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

				@if($listing->isEmpty())
				<span class="text-danger">{{ NO_RESULT_FOUND }}</span>
				@else

				<div class="table-responsive-md">
					<table class="table table-bordered">
						<thead>
							<tr class="table-primary">
								<th scope="col">{{ SERIAL }}</th>
								<th scope="col">{{ FEATURED_PHOTO }}</th>
								<th scope="col">{{ LISTING_NAME }}</th>
								<th scope="col">{{ CATEGORY }}</th>
								<th scope="col">{{ LOCATION }}</th>
								<th scope="col">{{ STATUS }}</th>
								<th scope="col" class="w-150">{{ ACTION }}</th>
							</tr>
						</thead>
						<tbody>
							@php $i=0; @endphp
                        	@foreach($listing as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>
									<img src="{{ asset('public/uploads/listing_featured_photos/'.$row->listing_featured_photo) }}" alt="" class="w-100">
								</td>
								<td>
                                    {{ $row->listing_name }} <br>
                                    @if($row->is_featured == 'Yes')
                                        <span class="badge badge-success">{{ FEATURED }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ NOT_FEATURED }}</span>
                                    @endif
                                </td>
								<td>{{ $row->rListingCategory->listing_category_name }}</td>
								<td>{{ $row->rListingLocation->listing_location_name }}</td>
								<td>
									@if($row->listing_status == 'Active')
	                                <h6><span class="badge badge-success">
	                                @else
	                                <h6><span class="badge badge-danger">
	                                @endif
	                                {{ $row->listing_status }}</span></h6>
								</td>
								<td>
									<a href="{{ route('customer_listing_view_detail',$row->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

	                                <a href="{{ route('customer_listing_edit',$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

	                                <a href="{{ route('customer_listing_delete',$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
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
