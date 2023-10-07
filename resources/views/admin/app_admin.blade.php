@php
$user = Auth::user();
$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{ asset('public/uploads/site_photos/'.$g_setting->favicon) }}">

    <title>{{ ADMIN_PANEL }}</title>

    @include('admin.app_styles')

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    @include('admin.app_scripts')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        @php
            $route = Route::currentRouteName();
        @endphp

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin_dashboard') }}">
            <div class="sidebar-brand-text mx-3 ttn">
                <div class="left">
                    <img src="{{ asset('public/uploads/site_photos/'.$g_setting->favicon) }}" alt="">
                </div>
                <div class="right">
                    {{ env('APP_NAME') }}
                </div>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <!-- Dashboard -->
        <li class="nav-item {{ $route == 'admin_dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_dashboard') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>{{ DASHBOARD }}</span>
            </a>
        </li>


        <!-- General Settings -->
        <li class="nav-item {{ $route == 'admin_setting_general'||$route =='admin_payment'||$route =='admin_social_media_view'||$route =='admin_social_media_create'||$route =='admin_social_media_store'||$route =='admin_social_media_edit' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
                <i class="fas fa-folder"></i>
                <span>{{ SETTINGS }}</span>
            </a>
            <div id="collapseSetting" class="collapse {{ $route == 'admin_setting_general'||$route == 'admin_payment'||$route == 'admin_social_media_view'||$route =='admin_social_media_create'||$route =='admin_social_media_store'||$route =='admin_social_media_edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin_setting_general') }}">{{ GENERAL_SETTING }}</a>
                    <a class="collapse-item" href="{{ route('admin_payment') }}">{{ PAYMENT_SETTING }}</a>
                    <a class="collapse-item" href="{{ route('admin_social_media_view') }}">{{ SOCIAL_MEDIA }}</a>
                </div>
            </div>
        </li>

        <!-- Language Settings -->
        <li class="nav-item {{ $route =='admin_language_menu_text'||$route =='admin_language_website_text'||$route =='admin_language_notification_text'||$route =='admin_language_admin_panel_text' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLanguage" aria-expanded="true" aria-controls="collapseLanguage">
                <i class="fas fa-folder"></i>
                <span>{{ LANGUAGE_SETTINGS }}</span>
            </a>
            <div id="collapseLanguage" class="collapse {{ $route =='admin_language_menu_text'||$route =='admin_language_website_text'||$route =='admin_language_notification_text'||$route =='admin_language_admin_panel_text' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item " href="{{ route('admin_language_menu_text') }}">{{ MENU_TEXT }}</a>
                    <a class="collapse-item " href="{{ route('admin_language_website_text') }}">{{ WEBSITE_TEXT }}</a>
                    <a class="collapse-item " href="{{ route('admin_language_notification_text') }}">{{ NOTIFICATION_TEXT }}</a>
                    <a class="collapse-item " href="{{ route('admin_language_admin_panel_text') }}">{{ ADMIN_PANEL_TEXT }}</a>
                </div>
            </div>
        </li>



        <!-- Page Settings -->
        <li class="nav-item {{ $route == 'admin_page_home_edit'||$route == 'admin_page_about_edit'||$route == 'admin_page_blog_edit'||$route == 'admin_page_faq_edit'||$route == 'admin_page_contact_edit'||$route == 'admin_page_term_edit'||$route == 'admin_page_privacy_edit'||$route == 'admin_page_other_edit'||$route == 'admin_page_pricing_edit'||$route == 'admin_page_listing_category_edit'||$route == 'admin_page_listing_location_edit'||$route == 'admin_page_listing_edit' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageSettings" aria-expanded="true" aria-controls="collapsePageSettings">
                <i class="fas fa-folder"></i>
                <span>{{ PAGE_SETTINGS }}</span>
            </a>
            <div id="collapsePageSettings" class="collapse {{ $route == 'admin_page_home_edit'||$route == 'admin_page_about_edit'||$route == 'admin_page_blog_edit'||$route == 'admin_page_faq_edit'||$route == 'admin_page_contact_edit'||$route == 'admin_page_term_edit'||$route == 'admin_page_privacy_edit'||$route == 'admin_page_other_edit'||$route == 'admin_page_pricing_edit'||$route == 'admin_page_listing_category_edit'||$route == 'admin_page_listing_location_edit'||$route == 'admin_page_listing_edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin_page_home_edit') }}">{{ HOME }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_about_edit') }}">{{ ABOUT }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_blog_edit') }}">{{ BLOG }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_faq_edit') }}">{{ FAQ }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_contact_edit') }}">{{ CONTACT }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_pricing_edit') }}">{{ PRICING }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_listing_category_edit') }}">{{ LISTING_CATEGORY }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_listing_location_edit') }}">{{ LISTING_LOCATION }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_listing_edit') }}">{{ LISTING }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_term_edit') }}">{{ TERMS_AND_CONDITIONS }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_privacy_edit') }}">{{ PRIVACY_POLICY }}</a>
                    <a class="collapse-item" href="{{ route('admin_page_other_edit') }}">{{ OTHER }}</a>
                </div>
            </div>
        </li>



        <!-- Blog Settings -->
        <li class="nav-item {{ $route == 'admin_category_view'||$route == 'admin_category_create'||$route == 'admin_category_edit'||$route =='admin_blog_view'||$route =='admin_blog_create'||$route =='admin_blog_edit'||$route =='admin_comment_approved'||$route =='admin_comment_pending' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
                <i class="fas fa-folder"></i>
                <span>{{ BLOG_SECTION }}</span>
            </a>
            <div id="collapseBlog" class="collapse {{ $route == 'admin_category_view'||$route == 'admin_category_create'||$route == 'admin_category_edit'||$route =='admin_blog_view'||$route =='admin_blog_create'||$route =='admin_blog_edit'||$route =='admin_comment_approved'||$route =='admin_comment_pending' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{ route('admin_category_view') }}">{{ CATEGORIES }}</a>
                    <a class="collapse-item" href="{{ route('admin_blog_view') }}">{{ BLOGS }}</a>
                    <a class="collapse-item" href="{{ route('admin_comment_approved') }}">{{ APPROVED_COMMENTS }}</a>
                    <a class="collapse-item" href="{{ route('admin_comment_pending') }}">{{ PENDING_COMMENTS }}</a>

                </div>
            </div>
        </li>

        <!-- Blog Settings -->
        <li class="nav-item {{ $route == 'knowledge_bank_category_view' || $route== 'kb_category_create' || $route == 'store_knowledge_cat' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKnowledge" aria-expanded="true" aria-controls="collapseKnowledge">
                <i class="fas fa-folder"></i>
                <span>{{ KNOWLEDGE_BANK }}</span>
            </a>
            <div id="collapseKnowledge" class="collapse {{ $route == 'knowledge_bank_category_view' || $route == 'kb_category_create' || $route == 'store_knowledge_cat' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{ route('knowledge_bank_category_view') }}">{{ CATEGORIES }}</a>
                    <a class="collapse-item" href="{{ route('kb_subcats') }}">{{ SUB_CATEGORIES }}</a>
                    <a class="collapse-item" href="{{ route('kb_topics') }}">{{ TOPICS }}</a>

                </div>
            </div>
        </li>


        <!-- Website Settings -->
        <li class="nav-item {{ $route == 'admin_faq_view'||$route == 'admin_faq_create'||$route == 'admin_faq_edit' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWebsite" aria-expanded="true" aria-controls="collapseWebsite">
                <i class="fas fa-folder"></i>
                <span>{{ WEBSITE_SECTION }}</span>
            </a>
            <div id="collapseWebsite" class="collapse {{ $route == 'admin_faq_view'||$route == 'admin_faq_create'||$route == 'admin_faq_edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{ route('admin_faq_view') }}">{{ FAQ }}</a>

                </div>
            </div>
        </li>



        <!-- Listing Settings -->
        <li class="nav-item {{ $route == 'admin_amenity_view'||$route == 'admin_amenity_create'||$route == 'admin_amenity_edit'||$route == 'admin_listing_category_view'||$route == 'admin_listing_category_create'||$route == 'admin_listing_category_edit'||$route == 'admin_listing_location_view'||$route == 'admin_listing_location_create'||$route == 'admin_listing_location_edit'||$route == 'admin_listing_view'||$route == 'admin_listing_create'||$route == 'admin_listing_edit' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseListing" aria-expanded="true" aria-controls="collapseListing">
                <i class="fas fa-folder"></i>
                <span>{{ LISTING_SECTION }}</span>
            </a>
            <div id="collapseListing" class="collapse {{ $route == 'admin_amenity_view'||$route == 'admin_amenity_create'||$route == 'admin_amenity_edit'||$route == 'admin_listing_category_view'||$route == 'admin_listing_category_create'||$route == 'admin_listing_category_edit'||$route == 'admin_listing_location_view'||$route == 'admin_listing_location_create'||$route == 'admin_listing_location_edit'||$route == 'admin_listing_view'||$route == 'admin_listing_create'||$route == 'admin_listing_edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin_listing_category_view') }}">{{ LISTING_CATEGORY }}</a>
                    <a class="collapse-item" href="{{ route('admin_listing_location_view') }}">{{ LISTING_LOCATION }}</a>
                    <a class="collapse-item" href="{{ route('admin_amenity_view') }}">{{ LISTING_AMENITY }}</a>
                    <a class="collapse-item" href="{{ route('admin_listing_view') }}">{{ LISTING }}</a>
                </div>
            </div>
        </li>


        <!-- Review Section -->
        <li class="nav-item {{ $route == 'admin_view_admin_review'||$route == 'admin_view_customer_review' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReview" aria-expanded="true" aria-controls="collapseReview">
                <i class="fas fa-folder"></i>
                <span>{{ REVIEW_SECTION }}</span>
            </a>
            <div id="collapseReview" class="collapse {{ $route == 'admin_view_admin_review'||$route == 'admin_view_customer_review' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{ route('admin_view_admin_review') }}">{{ ADMIN_REVIEW }}</a>
                    <a class="collapse-item" href="{{ route('admin_view_customer_review') }}">{{ CUSTOMER_REVIEW }}</a>

                </div>
            </div>
        </li>




        <!-- Package Section -->
        <li class="nav-item {{ $route == 'admin_package_view'||$route == 'admin_package_create'||$route == 'admin_package_edit' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_package_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ PACKAGE_SECTION }}</span>
            </a>
        </li>


        <!-- Dynamic Pages -->
        <li class="nav-item {{ $route == 'admin_dynamic_page_view'||$route == 'admin_dynamic_page_create'||$route == 'admin_dynamic_page_edit' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_dynamic_page_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ DYNAMIC_PAGES }}</span>
            </a>
        </li>


        <!-- Purchase History -->
        <li class="nav-item {{ $route == 'admin_purchase_history_view'||$route == 'admin_purchase_history_detail'||$route == 'admin_purchase_history_invoice' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_purchase_history_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ PURCHASE_HISTORY }}</span>
            </a>
        </li>


        <!-- Customer -->
        <li class="nav-item {{ $route == 'admin_customer_view' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_customer_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ CUSTOMER }}</span>
            </a>
        </li>


        <!-- Email Template -->
        <li class="nav-item {{ $route == 'admin_email_template_view' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_email_template_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ EMAIL_TEMPLATE }}</span>
            </a>
        </li>

        <li class="nav-item {{ $route == 'slider_settings' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('slider_settings') }}">
                <i class="far fa-caret-square-right"></i>
                <span>Slider Settings</span>
            </a>
        </li>
        <!-- Clear Database -->
        <li class="nav-item {{ $route == 'admin_clear_database' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_clear_database') }}" onClick="return confirm('Be careful! All data will be removed from the website. Want to do that?');">
                <i class="far fa-caret-square-right"></i>
                <span>{{ CLEAR_DATABASE }}</span>
            </a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="btn btn-info btn-sm mt-3" href="{{ url('/') }}" target="_blank">
                            {{ VISIT_WEBSITE }}
                        </a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600">{{ $user->name }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('public/uploads/user_photos/'.$user->photo) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="{{ route('admin_profile_change') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_PROFILE }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin_password_change') }}">
                                <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_PASSWORD }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin_photo_change') }}">
                                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_PHOTO }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin_banner_change') }}">
                                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_BANNER }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin_logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ LOGOUT }}
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('admin_content')

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('admin.app_scripts_footer')

</body>
</html>
