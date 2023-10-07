@php
$g_settings = \App\Models\GeneralSetting::where('id',1)->first();
$dynamic_pages = \App\Models\DynamicPage::get();
$page_about_item = \App\Models\PageAboutItem::where('id',1)->first();
$page_faq_item = \App\Models\PageFaqItem::where('id',1)->first();
$page_blog_item = \App\Models\PageBlogItem::where('id',1)->first();
$page_listing_item = \App\Models\PageListingItem::where('id',1)->first();
$page_pricing_item = \App\Models\PagePricingItem::where('id',1)->first();
$page_contact_item = \App\Models\PageContactItem::where('id',1)->first();
$page_listing_location_item = \App\Models\PageListingLocationItem::where('id',1)->first();
$page_listing_category_item = \App\Models\PageListingCategoryItem::where('id',1)->first();
$kb_cat= \App\Models\knowledgecategory::all();
$kb_cat_count= \App\Models\knowledgecategory::all()->count();
@endphp

<!-- Start Navbar Area -->
<div class="navbar-area" id="stickymenu">

	<!-- Menu For Mobile Device -->
	<div class="mobile-nav">
		<a href="{{ url('/') }}" class="logo">
			<img src="{{ asset('public/uploads/site_photos/'.$g_settings->logo) }}" alt="">
		</a>
	</div>

	<!-- Menu For Desktop Device -->
	<div class="main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="{{ url('/') }}">
					<img src="{{ asset('public/uploads/site_photos/'.$g_settings->logo) }}" alt="">
				</a>
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav {{ $g_settings->layout_direction == 'ltr' ? 'ml-auto' : 'mr-auto' }}">


						<li class="nav-item">
							<a href="{{ url('/') }}" class="nav-link">{{ MENU_HOME }}</a>
						</li>
												<?php if($kb_cat_count!= 0){ ?>
							<li class="nav-item">
							<a href="javascript:void;" class="nav-link dropdown-toggle">Knowledge Bank</a>
							<ul class="dropdown-menu">
								<?php
							for($i=0; $i<$kb_cat_count; $i++){
							?>
								<li class="nav-item">
									<a href=" {{ route('kb_cat_view',$kb_cat[$i]->id) }}" class="nav-link">{{$kb_cat[$i]->category_name}}</a>
								</li>
							<?php } ?>
							</ul>
							</li>
							<?php } ?>
						<li class="nav-item">
							<a href="{{ url('https://homesstoday.in/') }}" class="nav-link" target="_blank" >Manufacturer/Supplier</a>
						</li>
                        @if($page_listing_item->status == 'Show')
						<li class="nav-item">
							<a href="{{ url('listing-result?text=') }}" class="nav-link">{{ MENU_LISTING }}</a>
						</li>
                        @endif
						<li class="nav-item">
							<a href="{{ url('#') }}" class="nav-link">Showcase</a>
						</li>
                        @if($g_settings->customer_listing_option == 'On')
						<li class="nav-item nav-item-last">
							@if(Auth::user())
							<a href="{{ route('customer_dashboard') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> {{ MENU_DASHBOARD }}</a>
							@else
							<a href="{{ route('customer_login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> {{ MENU_LOGIN_REGISTER }}</a>
							@endif
						</li>
                        @endif

					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- End Navbar Area -->
