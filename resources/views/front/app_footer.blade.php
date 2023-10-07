@php
$g_settings = \App\Models\GeneralSetting::where('id',1)->first();
$social_media = \App\Models\SocialMediaItem::orderBy('social_order', 'asc')->get();
$listing_categories = \App\Models\ListingCategory::orderBy('listing_category_name','asc')->skip(0)->take(5)->get();
$listing_locations = \App\Models\ListingLocation::orderBy('listing_location_name','asc')->skip(0)->take(5)->get();
$page_faq_item = \App\Models\PageFaqItem::where('id',1)->first();
$page_blog_item = \App\Models\PageBlogItem::where('id',1)->first();
$page_privacy_item = \App\Models\PagePrivacyItem::where('id',1)->first();
$page_term_item = \App\Models\PageTermItem::where('id',1)->first();
@endphp

<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="footer-item footer-service">
					<h2>{{ $g_settings->footer_column_1_heading }}</h2>
					<ul class="fmain">
                        @php $i=0; @endphp
						@foreach($listing_categories as $row)
                            @php $i++; @endphp
                            @if($i>$g_settings->footer_column_1_total_item)
                                @break
                            @endif
						    <li>
                                <a href="{{ route('front_listing_category_detail',$row->listing_category_slug) }}">{{ $row->listing_category_name }}</a>
                            </li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="footer-item footer-service">
					<h2>{{ $g_settings->footer_column_2_heading }}</h2>
					<ul class="fmain">
                        @php $i=0; @endphp
						@foreach($listing_locations as $row)
                            @php $i++; @endphp
                            @if($i>$g_settings->footer_column_2_total_item)
                                @break
                            @endif
						    <li><a href="{{ route('front_listing_location_detail',$row->listing_location_slug) }}">{{ $row->listing_location_name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="footer-item footer-service">
					<h2>{{ $g_settings->footer_column_3_heading }}</h2>
					<ul class="fmain">
						<li><a href="{{ url('/') }}">{{ MENU_HOME }}</a></li>

                        @if($page_privacy_item->status == 'Show')
						<li><a href="{{ route('front_privacy_policy') }}">{{ MENU_PRIVACY_POLICY }}</a></li>
                        @endif

                        @if($page_term_item->status == 'Show')
						<li><a href="{{ route('front_terms_and_conditions') }}">{{ MENU_TERMS_AND_CONDITIONS }}</a></li>
                        @endif

                        @if($page_blog_item->status == 'Show')
						<li><a href="{{ route('front_blogs') }}">{{ MENU_BLOG }}</a></li>
                        @endif

                        @if($page_faq_item->status == 'Show')
						<li><a href="{{ route('front_faq') }}">{{ MENU_FAQ }}</a></li>
                        @endif

					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="footer-item footer-contact">
					<h2>{{ $g_settings->footer_column_4_heading }}</h2>
					<ul>
						<li>
							{!! clean(nl2br($g_settings->footer_address)) !!}
						</li>
						<li>
							{!! clean(nl2br($g_settings->footer_email)) !!}
						</li>
						<li>
							{!! clean(nl2br($g_settings->footer_phone)) !!}
						</li>
					</ul>
				</div>
				<div class="footer-item footer-service">
					<div class="footer-social-link">
						<ul>
							@foreach($social_media as $row)
                                <li><a href="{{ $row->social_url }}" target="_blank"><i class="{{ $row->social_icon }}"></i></a></li>
                            @endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="copyright">
					<p>{{ $g_settings->footer_copyright }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
