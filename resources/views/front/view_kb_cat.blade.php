@extends('front.app_front')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<br><br><br>
			<div class="listing-filter">

                        <div class="lf-heading">
                           {{$main_cat->category_name}}
                        </div>

                        <div class="lf-widget">
                            <h2>{{ CATEGORIES }}</h2>
                            
                                <div class="form-check footer-item">
                                    <ul class="f-main">
                                    	@if(isset($subcats))
                                    	@foreach($subcats as $subcat )
                                    	<li > <a href="{{route('get_cat_view',[$main_cat->id,$subcat->id])}}">{{$subcat->name}}</a> </li>
                                    	@endforeach
                                    	@else
                                    	<h3>No subcategories found</h3>
                                    	@endif
                                    </ul>
                                </div>
                            
                        </div>


                      

                    </div>
		</div>
		<div class="col-md-9">
			<div class="">
				<br><br><br>
				@if($topic!='')
				<div class="card" style="height:200px;background:url('{{asset('public/kb-images/')}}<?php echo "/".$topic->featured_img; ?>');background-size: cover;background-repeat: no-repeat; "></div>
				<br><br>
				<h2>{{$topic->title}}</h2>
				{!! $topic->description !!}
				@else
				<h2 style="text-align: center;">Oops!No Topic Found!!</h2>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
