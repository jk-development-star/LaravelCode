@extends('front.app_front')

@section('content')

<div class="page-banner">
	<h1>{{ $terms_data->name }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ $terms_data->name }}</li>
		</ol>
	</nav>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				{!! clean($terms_data->detail) !!}
			</div>
		</div>
	</div>
</div>

@endsection
