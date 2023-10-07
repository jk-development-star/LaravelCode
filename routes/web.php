<?php
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CustomerController as CustomerControllerForAdmin;
use App\Http\Controllers\Admin\DashboardController as DashboardControllerForAdmin;
use App\Http\Controllers\Admin\DynamicPageController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\LoginController as LoginControllerForAdmin;
use App\Http\Controllers\Admin\PageAboutController;
use App\Http\Controllers\Admin\PageBlogController;
use App\Http\Controllers\Admin\PageContactController;
use App\Http\Controllers\Admin\PagePricingController;
use App\Http\Controllers\Admin\PageListingCategoryController;
use App\Http\Controllers\Admin\PageListingLocationController;
use App\Http\Controllers\Admin\PageListingController;
use App\Http\Controllers\Admin\PageFaqController;
use App\Http\Controllers\Admin\PageHomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageOtherController;
use App\Http\Controllers\Admin\PagePrivacyController;
use App\Http\Controllers\Admin\PageTermController;
use App\Http\Controllers\Admin\CategoryController as CategoryControllerForAdmin;
use App\Http\Controllers\Admin\BlogController as BlogControllerForAdmin;
use App\Http\Controllers\Admin\AmenityController as AmenityControllerForAdmin;
use App\Http\Controllers\Admin\ListingCategoryController as ListingCategoryControllerForAdmin;
use App\Http\Controllers\Admin\ListingLocationController as ListingLocationControllerForAdmin;
use App\Http\Controllers\Admin\ListingController as ListingControllerForAdmin;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SocialMediaItemController;
use App\Http\Controllers\Admin\FaqController as FaqControllerForAdmin;
use App\Http\Controllers\Admin\PackageController as PackageControllerForAdmin;
use App\Http\Controllers\Admin\PurchaseHistoryController as PurchaseHistoryControllerForAdmin;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ClearDatabaseController;

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\BlogController as BlogControllerForFront;
use App\Http\Controllers\Front\CategoryController as CategoryControllerForFront;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController as FaqControllerForFront;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\TermController;
use App\Http\Controllers\Front\CustomerAuthController;
use App\Http\Controllers\Front\CustomerController as CustomerControllerForFront;
use App\Http\Controllers\Front\ListingController as ListingControllerForFront;

use Illuminate\Support\Facades\Route;

/* --------------------------------------- */
/* Front End */
/* --------------------------------------- */
Route::get('/', [HomeController::class,'index']);

Route::get('about', [AboutController::class,'index'])
    ->name('front_about');

Route::get('pricing', [PricingController::class,'index'])
    ->name('front_pricing');

Route::get('blog', [BlogControllerForFront::class,'index'])
    ->name('front_blogs');

Route::get('post/{slug}', [BlogControllerForFront::class,'detail'])
    ->name('front_post');

Route::post('post/comment', [BlogControllerForFront::class,'comment'])
    ->name('front_comment');

Route::get('category/{slug}', [CategoryControllerForFront::class,'detail'])
    ->name('front_category');

Route::post('search', [SearchController::class,'index']);

Route::get('search', function() {abort(404);});

Route::get('faq', [FaqControllerForFront::class,'index'])
    ->name('front_faq');

Route::get('page/{slug}', [PageController::class,'detail'])
    ->name('front_dynamic_page');

Route::get('contact', [ContactController::class,'index'])
    ->name('front_contact');

Route::post('contact/store', [ContactController::class,'send_email'])
    ->name('front_contact_form');

Route::get('terms-and-conditions', [TermController::class,'index'])
    ->name('front_terms_and_conditions');

Route::get('privacy-policy', [PrivacyController::class,'index'])
    ->name('front_privacy_policy');

Route::get('listing/{slug}', [ListingControllerForFront::class,'detail'])
    ->name('front_listing_detail');

Route::post('listing/listing/send-message', [ListingControllerForFront::class,'send_message'])
    ->name('front_listing_detail_send_message');

Route::post('listing/listing/report-listing', [ListingControllerForFront::class,'report_listing'])
    ->name('front_listing_detail_report_listing');



Route::get('listing/category/all', [ListingControllerForFront::class,'category_all'])
    ->name('front_listing_category_all');

Route::get('listing/category/{slug}', [ListingControllerForFront::class,'category_detail'])
    ->name('front_listing_category_detail');

Route::get('listing/location/all', [ListingControllerForFront::class,'location_all'])
    ->name('front_listing_location_all');

Route::get('listing/location/{slug}', [ListingControllerForFront::class,'location_detail'])
    ->name('front_listing_location_detail');

Route::get('agent/{type}/{id}', [ListingControllerForFront::class,'agent_detail'])
    ->name('front_listing_agent_detail');

Route::get('listing-result', [ListingControllerForFront::class,'listing_result'])
    ->name('front_listing_result');

Route::get('customer/wishlist/add/{id}', [ListingControllerForFront::class,'wishlist_add'])
    ->name('front_add_wishlist');




/* --------------------------------------- */
/* Customer Authemtication */
/* --------------------------------------- */
Route::get('customer/login', [CustomerAuthController::class,'login'])
    ->name('customer_login');

Route::post('customer/login/store', [CustomerAuthController::class,'login_store'])
    ->name('customer_login_store');

Route::get('customer/logout', [CustomerAuthController::class,'logout'])
    ->name('customer_logout');

Route::get('customer/register', [CustomerAuthController::class,'registration'])
    ->name('customer_registration');

Route::post('customer/registration/store', [CustomerAuthController::class,'registration_store'])
    ->name('customer_registration_store');

Route::get('customer/registration/verify/{token}/{email}', [CustomerAuthController::class,'registration_verify'])
    ->name('customer_registration_verify');

Route::get('customer/forget-password', [CustomerAuthController::class,'forget_password'])
    ->name('customer_forget_password');

Route::post('customer/forget-password/store', [CustomerAuthController::class,'forget_password_store'])
    ->name('customer_forget_password_store');

Route::get('customer/reset-password/{token}/{email}', [CustomerAuthController::class,'reset_password']);
Route::post('customer/reset-password/update', [CustomerAuthController::class,'reset_password_update'])
    ->name('customer_reset_password_update');



/* --------------------------------------- */
/* Customer Profile */
/* --------------------------------------- */
Route::get('customer/dashboard', [CustomerControllerForFront::class,'dashboard'])
    ->name('customer_dashboard');

Route::get('customer/package', [CustomerControllerForFront::class,'package'])
    ->name('customer_package');

Route::get('customer/package/free/{id}', [CustomerControllerForFront::class,'free_enroll'])
    ->name('customer_package_free_enroll');

Route::get('customer/package/paid/buy/{id}', [CustomerControllerForFront::class,'buy_package'])
    ->name('customer_package_buy');

Route::post('customer/payment/stripe', [CustomerControllerForFront::class,'stripe'])
    ->name('customer_payment_stripe');
Route::get('customer/payment/paypal', [CustomerControllerForFront::class,'paypal']);

Route::get('customer/package/purchase/history', [CustomerControllerForFront::class,'purchase_history'])
    ->name('customer_package_purchase_history');

Route::get('customer/package/purchase/{id}', [CustomerControllerForFront::class,'purchase_history_detail'])
    ->name('customer_package_purchase_history_detail');

Route::get('customer/package/invoice/{id}', [CustomerControllerForFront::class,'invoice'])
    ->name('customer_package_purchase_invoice');

Route::get('customer/profile-change', [CustomerControllerForFront::class,'update_profile'])
    ->name('customer_update_profile');

Route::post('customer/profile-change/update', [CustomerControllerForFront::class,'update_profile_confirm'])
    ->name('customer_update_profile_confirm');

Route::get('customer/password-change', [CustomerControllerForFront::class,'update_password'])
    ->name('customer_update_password');

Route::post('customer/password-change/update', [CustomerControllerForFront::class,'update_password_confirm'])
    ->name('customer_update_password_confirm');

Route::get('customer/photo-change', [CustomerControllerForFront::class,'update_photo'])
    ->name('customer_update_photo');

Route::post('customer/photo-change/update', [CustomerControllerForFront::class,'update_photo_confirm'])
    ->name('customer_update_photo_confirm');

Route::get('customer/banner-change', [CustomerControllerForFront::class,'update_banner'])
    ->name('customer_update_banner');

Route::post('customer/banner-change/update', [CustomerControllerForFront::class,'update_banner_confirm'])
    ->name('customer_update_banner_confirm');

Route::get('customer/listing/view', [CustomerControllerForFront::class,'listing_view'])
    ->name('customer_listing_view');

Route::get('customer/listing/detail/{id}', [CustomerControllerForFront::class,'listing_view_detail'])
    ->name('customer_listing_view_detail');

Route::get('customer/listing/add', [CustomerControllerForFront::class,'listing_add'])
    ->name('customer_listing_add');

Route::post('customer/listing/add/store', [CustomerControllerForFront::class,'listing_add_store'])
    ->name('customer_listing_add_store');

Route::get('customer/listing/delete/{id}', [CustomerControllerForFront::class,'listing_delete'])
    ->name('customer_listing_delete');

Route::get('customer/listing/edit/{id}', [CustomerControllerForFront::class,'listing_edit'])
    ->name('customer_listing_edit');

Route::post('customer/listing/update/{id}', [CustomerControllerForFront::class,'listing_update'])
    ->name('customer_listing_update');

Route::get('customer/reviews', [CustomerControllerForFront::class,'my_reviews'])
    ->name('customer_my_reviews');

Route::get('customer/review/edit/{id}', [CustomerControllerForFront::class,'review_edit'])
    ->name('customer_my_review_edit');

Route::post('customer/review/update/{id}', [CustomerControllerForFront::class,'review_update'])
    ->name('customer_my_review_update');

Route::get('customer/review/delete/{id}', [CustomerControllerForFront::class,'review_delete'])
    ->name('customer_my_review_delete');

Route::get('customer/wishlist', [CustomerControllerForFront::class,'wishlist'])
    ->name('customer_wishlist');

Route::get('customer/wishlist/delete/{id}', [CustomerControllerForFront::class,'wishlist_delete'])
    ->name('customer_wishlist_delete');

Route::get('customer/listing/delete-social-item/{id}', [CustomerControllerForFront::class,'listing_delete_social_item'])
    ->name('customer_listing_delete_social_item');

Route::get('customer/listing/delete-photo/{id}', [CustomerControllerForFront::class,'listing_delete_photo'])
    ->name('customer_listing_delete_photo');

Route::get('customer/listing/delete-video/{id}', [CustomerControllerForFront::class,'listing_delete_video'])
    ->name('customer_listing_delete_video');

Route::get('customer/listing/delete-additional-feature/{id}', [CustomerControllerForFront::class,'listing_delete_additional_feature'])
    ->name('customer_listing_delete_additional_feature');

Route::post('customer/review', [CustomerControllerForFront::class,'submit_review'])
    ->name('customer_review');



/* --------------------------------------- */
/* --------------------------------------- */
/* --------------------------------------- */
/* ADMIN SECTION */
/* --------------------------------------- */
/* --------------------------------------- */
/* --------------------------------------- */

/* --------------------------------------- */
/* Login and profile management */
/* --------------------------------------- */
Route::get('admin/dashboard', [DashboardControllerForAdmin::class,'index'])
    ->name('admin_dashboard');

Route::get('admin', function () {return redirect('admin/login');});

Route::get('admin/login', [LoginControllerForAdmin::class,'login'])
    ->name('admin_login');
// Code By ayan
Route::get('admin/knowledge-bank-categories',[DashboardControllerForAdmin::class,'get_knowledge_cat'])->name('knowledge_bank_category_view');
Route::get('admin/knowledgebank-category-create',[DashboardControllerForAdmin::class,'add_knowledge_cat'])->name('kb_category_create');
Route::post('admin/knowledgebank-category-create',[DashboardControllerForAdmin::class,'store_knowledge_cat'])->name('store_knowledge_cat');
Route::get('admin/knowledgebank-category-edit/{id}',[DashboardControllerForAdmin::class,'kb_cat_edit'])->name('kb_cat_edit');
Route::post('admin/knowledgebank-category-update',[DashboardControllerForAdmin::class,'kb_cat_update'])->name('kb_cat_update');
Route::get('admin/knowledgebank-category-delete/{id}',[DashboardControllerForAdmin::class,'kb_cat_delete'])->name('kb_cat_delete');

Route::get('admin/knowledge-bank-subcategories',[DashboardControllerForAdmin::class,'sub_cats'])->name('kb_subcats');
Route::get('admin/add-knowledge-subcategory',[DashboardControllerForAdmin::class,'add_sub_cats'])->name('add_kb_subcats');
Route::post('admin/insert-knowledge-subcategory',[DashboardControllerForAdmin::class,'insert_sub_cats'])->name('insert_kb_subcats');
Route::get('admin/insert-knowledge-subcategory/{id}',[DashboardControllerForAdmin::class,'delete_sub_cats'])->name('delete_kb_subcats');
Route::get('admin/edit-knowledge-subcategory/{id}',[DashboardControllerForAdmin::class,'edit_sub_cats'])->name('edit_kb_subcats');
Route::post('admin/update-knowledge-subcategory',[DashboardControllerForAdmin::class,'update_sub_cats'])->name('update_kb_subcats');
Route::get('admin/kb-topics',[DashboardControllerForAdmin::class,'kb_topics'])->name('kb_topics');
Route::get('admin/add-kb-topics',[DashboardControllerForAdmin::class,'add_kb_topics'])->name('add_kb_topic');
Route::post('admin/insert-kb-topics',[DashboardControllerForAdmin::class,'insert_kb_topics'])->name('insert_kb_topics');
Route::get('admin/view-kb-topic',[DashboardControllerForAdmin::class,'view_kb_topic'])->name('view_kb_topic');
Route::get('admin/edit-kb-topic/{id}',[DashboardControllerForAdmin::class,'edit_kb_topic'])->name('edit_kb_topic');
Route::get('admin/delete-kb-topic/{id}',[DashboardControllerForAdmin::class,'delete_kb_topic'])->name('delete_kb_topic');
Route::post('admin/update-kb-topic',[DashboardControllerForAdmin::class,'update_kb_topic'])->name('update_kb_topic');
Route::get('admin/slider-settings',[DashboardControllerForAdmin::class,'slider_settings'])->name('slider_settings');
Route::get('admin/add-slider-image',[DashboardControllerForAdmin::class,'add_slider_image'])->name('add_slider_image');
Route::post('admin/insert-slider-image',[DashboardControllerForAdmin::class,'insert_slider_image'])->name('insert_slider_image');
Route::get('admin/delete-slider-image/{id}',[DashboardControllerForAdmin::class,'delete_slider_image'])->name('delete_slider_image');

Route::get('kb-cat-view/{id}',[HomeController::class, 'view_kb_cat'])->name('kb_cat_view');
Route::get('kb-cat-view/{cat}/{subcat}',[HomeController::class, 'get_kb_cat'])->name('get_cat_view');

// Route::get('knowledge-bank',[DashboardControllerForAdmin::class,'knowledge_bank'])->name('knowledge-bank');

//code by ayan end

Route::post('admin/login/store', [LoginControllerForAdmin::class,'login_check'])
    ->name('admin_login_store');

Route::get('admin/logout', [LoginControllerForAdmin::class,'logout'])
    ->name('admin_logout');

Route::get('admin/forget-password', [LoginControllerForAdmin::class,'forget_password'])
    ->name('admin_forget_password');

Route::post('admin/forget-password/store', [LoginControllerForAdmin::class,'forget_password_check'])
    ->name('admin_forget_password_store');

Route::get('admin/reset-password/{token}/{email}', [LoginControllerForAdmin::class,'reset_password']);

Route::post('admin/reset-password/update', [LoginControllerForAdmin::class,'reset_password_update'])
    ->name('admin_reset_password_update');

Route::get('admin/password-change', [ProfileController::class,'password'])
    ->name('admin_password_change');

Route::post('admin/password-change/update', [ProfileController::class,'password_update'])
    ->name('admin_password_change_update');

Route::get('admin/profile-change', [ProfileController::class,'profile'])
    ->name('admin_profile_change');

Route::post('admin/profile-change/update', [ProfileController::class,'profile_update'])
    ->name('admin_profile_change_update');

Route::get('admin/photo-change', [ProfileController::class,'photo'])
    ->name('admin_photo_change');

Route::post('admin/photo-change/update', [ProfileController::class,'photo_update'])
    ->name('admin_photo_change_update');

Route::get('admin/banner-change', [ProfileController::class,'banner'])
    ->name('admin_banner_change');

Route::post('admin/banner-change/update', [ProfileController::class,'banner_update'])
    ->name('admin_banner_change_update');




/* --------------------------------------- */
/* Payment */
/* --------------------------------------- */
Route::get('admin/payment/view', [SettingController::class,'payment_edit'])
    ->name('admin_payment');

Route::post('admin/payment/update', [SettingController::class,'payment_update'])
    ->name('admin_payment_update');




/* --------------------------------------- */
/* Blog Category */
/* --------------------------------------- */
Route::get('admin/category/view', [CategoryControllerForAdmin::class,'index'])
    ->name('admin_category_view');

Route::get('admin/category/create', [CategoryControllerForAdmin::class,'create'])
    ->name('admin_category_create');

Route::post('admin/category/store', [CategoryControllerForAdmin::class,'store'])
    ->name('admin_category_store');

Route::get('admin/category/delete/{id}', [CategoryControllerForAdmin::class,'destroy'])
    ->name('admin_category_delete');

Route::get('admin/category/edit/{id}', [CategoryControllerForAdmin::class,'edit'])
    ->name('admin_category_edit');

Route::post('admin/category/update/{id}', [CategoryControllerForAdmin::class,'update'])
    ->name('admin_category_update');


/* --------------------------------------- */
/* Blog */
/* --------------------------------------- */
Route::get('admin/blog/view', [BlogControllerForAdmin::class,'index'])
    ->name('admin_blog_view');

Route::get('admin/blog/create', [BlogControllerForAdmin::class,'create'])
    ->name('admin_blog_create');

Route::post('admin/blog/store', [BlogControllerForAdmin::class,'store'])
    ->name('admin_blog_store');

Route::get('admin/blog/delete/{id}', [BlogControllerForAdmin::class,'destroy'])
    ->name('admin_blog_delete');

Route::get('admin/blog/edit/{id}', [BlogControllerForAdmin::class,'edit'])
    ->name('admin_blog_edit');

Route::post('admin/blog/update/{id}', [BlogControllerForAdmin::class,'update'])
    ->name('admin_blog_update');


/* --------------------------------------- */
/* Blog Comment */
/* --------------------------------------- */
Route::get('admin/comment/approved', [CommentController::class,'approved'])
    ->name('admin_comment_approved');

Route::get('admin/comment/make-pending/{id}', [CommentController::class,'make_pending'])
    ->name('admin_comment_make_pending');

Route::get('admin/comment/pending', [CommentController::class,'pending'])
    ->name('admin_comment_pending');

Route::get('admin/comment/make-approved/{id}', [CommentController::class,'make_approved'])
    ->name('admin_comment_make_approved');

Route::get('admin/comment/delete/{id}', [CommentController::class,'destroy'])
    ->name('admin_comment_delete');


/* --------------------------------------- */
/* Dynamic Pages */
/* --------------------------------------- */
Route::get('admin/dynamic-page/view', [DynamicPageController::class,'index'])
    ->name('admin_dynamic_page_view');

Route::get('admin/dynamic-page/create', [DynamicPageController::class,'create'])
    ->name('admin_dynamic_page_create');

Route::post('admin/dynamic-page/store', [DynamicPageController::class,'store'])
    ->name('admin_dynamic_page_store');

Route::get('admin/dynamic-page/delete/{id}', [DynamicPageController::class,'destroy'])
    ->name('admin_dynamic_page_delete');

Route::get('admin/dynamic-page/edit/{id}', [DynamicPageController::class,'edit'])
    ->name('admin_dynamic_page_edit');

Route::post('admin/dynamic-page/update/{id}', [DynamicPageController::class,'update'])
    ->name('admin_dynamic_page_update');



/* --------------------------------------- */
/* Amenity */
/* --------------------------------------- */
Route::get('admin/amenity/view', [AmenityControllerForAdmin::class,'index'])
    ->name('admin_amenity_view');

Route::get('admin/amenity/create', [AmenityControllerForAdmin::class,'create'])
    ->name('admin_amenity_create');

Route::post('admin/amenity/store', [AmenityControllerForAdmin::class,'store'])
    ->name('admin_amenity_store');

Route::get('admin/amenity/delete/{id}', [AmenityControllerForAdmin::class,'destroy'])
    ->name('admin_amenity_delete');

Route::get('admin/amenity/edit/{id}', [AmenityControllerForAdmin::class,'edit'])
    ->name('admin_amenity_edit');

Route::post('admin/amenity/update/{id}', [AmenityControllerForAdmin::class,'update'])
    ->name('admin_amenity_update');


/* --------------------------------------- */
/* Listing Category */
/* --------------------------------------- */
Route::get('admin/listing-category/view', [ListingCategoryControllerForAdmin::class,'index'])
    ->name('admin_listing_category_view');

Route::get('admin/listing-category/create', [ListingCategoryControllerForAdmin::class,'create'])
    ->name('admin_listing_category_create');

Route::post('admin/listing-category/store', [ListingCategoryControllerForAdmin::class,'store'])
    ->name('admin_listing_category_store');

Route::get('admin/listing-category/delete/{id}', [ListingCategoryControllerForAdmin::class,'destroy'])
    ->name('admin_listing_category_delete');

Route::get('admin/listing-category/edit/{id}', [ListingCategoryControllerForAdmin::class,'edit'])
    ->name('admin_listing_category_edit');

Route::post('admin/listing-category/update/{id}', [ListingCategoryControllerForAdmin::class,'update'])
    ->name('admin_listing_category_update');


/* --------------------------------------- */
/* Listing Location */
/* --------------------------------------- */
Route::get('admin/listing-location/view', [ListingLocationControllerForAdmin::class,'index'])
    ->name('admin_listing_location_view');

Route::get('admin/listing-location/create', [ListingLocationControllerForAdmin::class,'create'])
    ->name('admin_listing_location_create');

Route::post('admin/listing-location/store', [ListingLocationControllerForAdmin::class,'store'])
    ->name('admin_listing_location_store');

Route::get('admin/listing-location/delete/{id}', [ListingLocationControllerForAdmin::class,'destroy'])
    ->name('admin_listing_location_delete');

Route::get('admin/listing-location/edit/{id}', [ListingLocationControllerForAdmin::class,'edit'])
    ->name('admin_listing_location_edit');

Route::post('admin/listing-location/update/{id}', [ListingLocationControllerForAdmin::class,'update'])
    ->name('admin_listing_location_update');



/* --------------------------------------- */
/* Listing */
/* --------------------------------------- */
Route::get('admin/listing/view', [ListingControllerForAdmin::class,'index'])
    ->name('admin_listing_view');

Route::get('admin/listing/create', [ListingControllerForAdmin::class,'create'])
    ->name('admin_listing_create');

Route::post('admin/listing/store', [ListingControllerForAdmin::class,'store'])
    ->name('admin_listing_store');

Route::get('admin/listing/delete/{id}', [ListingControllerForAdmin::class,'destroy'])
    ->name('admin_listing_delete');

Route::get('admin/listing/edit/{id}', [ListingControllerForAdmin::class,'edit'])
    ->name('admin_listing_edit');

Route::post('admin/listing/update/{id}', [ListingControllerForAdmin::class,'update'])
    ->name('admin_listing_update');

Route::get('admin/listing/delete-social-item/{id}', [ListingControllerForAdmin::class,'delete_social_item'])
    ->name('admin_listing_delete_social_item');

Route::get('admin/listing/delete-photo/{id}', [ListingControllerForAdmin::class,'delete_photo'])
    ->name('admin_listing_delete_photo');

Route::get('admin/listing/delete-video/{id}', [ListingControllerForAdmin::class,'delete_video'])
    ->name('admin_listing_delete_video');

Route::get('admin/listing/delete-additional-feature/{id}', [ListingControllerForAdmin::class,'delete_additional_feature'])
    ->name('admin_listing_delete_additional_feature');

Route::get('admin/listing-status/{id}', [ListingControllerForAdmin::class,'change_status']);


/* --------------------------------------- */
/* Review Settings */
/* --------------------------------------- */
Route::get('admin/admin-review/view', [ReviewController::class,'view_admin_review'])
    ->name('admin_view_admin_review');

Route::post('admin/admin-review/store', [ReviewController::class,'store_admin_review'])
    ->name('admin_store_admin_review');

Route::post('admin/admin-review/update/{id}', [ReviewController::class,'update_admin_review'])
    ->name('admin_update_admin_review');

Route::get('admin/admin-review/delete/{id}', [ReviewController::class,'delete_admin_review'])
    ->name('admin_delete_admin_review');

Route::get('admin/customer-review/view', [ReviewController::class,'view_customer_review'])
    ->name('admin_view_customer_review');

Route::get('admin/customer-review/delete/{id}', [ReviewController::class,'delete_customer_review'])
    ->name('admin_delete_customer_review');

/* --------------------------------------- */
/* General Settings */
/* --------------------------------------- */
Route::get('admin/setting/general', [SettingController::class,'edit'])
    ->name('admin_setting_general');

Route::post('admin/setting/general/update', [SettingController::class,'update'])
    ->name('admin_setting_general_update');


/* --------------------------------------- */
/* Language Settings */
/* --------------------------------------- */
Route::get('admin/language/menu/view', [LanguageController::class,'language_menu_text'])
    ->name('admin_language_menu_text');

Route::post('admin/language/menu/update', [LanguageController::class,'language_menu_text_update'])
    ->name('admin_language_menu_text_update');

Route::get('admin/language/website/view', [LanguageController::class,'language_website_text'])
    ->name('admin_language_website_text');

Route::post('admin/language/website/update', [LanguageController::class,'language_website_text_update'])
    ->name('admin_language_website_text_update');

Route::get('admin/language/notification/view', [LanguageController::class,'language_notification_text'])
    ->name('admin_language_notification_text');

Route::post('admin/language/notification/update', [LanguageController::class,'language_notification_text_update'])
    ->name('admin_language_notification_text_update');


Route::get('admin/language/admin-panel/view', [LanguageController::class,'language_admin_panel_text'])
    ->name('admin_language_admin_panel_text');

Route::post('admin/language/admin-panel/update', [LanguageController::class,'language_admin_panel_text_update'])
    ->name('admin_language_admin_panel_text_update');


/* --------------------------------------- */
/* Page Settings */
/* --------------------------------------- */
Route::get('admin/page-home/edit', [PageHomeController::class,'edit'])
    ->name('admin_page_home_edit');
Route::post('admin/page-home/update', [PageHomeController::class,'update'])
    ->name('admin_page_home_update');

Route::get('admin/page-about/edit', [PageAboutController::class,'edit'])
    ->name('admin_page_about_edit');
Route::post('admin/page-about/update', [PageAboutController::class,'update'])
    ->name('admin_page_about_update');

Route::get('admin/page-blog/edit', [PageBlogController::class,'edit'])
    ->name('admin_page_blog_edit');
Route::post('admin/page-blog/update', [PageBlogController::class,'update'])
    ->name('admin_page_blog_update');

Route::get('admin/page-faq/edit', [PageFaqController::class,'edit'])
    ->name('admin_page_faq_edit');
Route::post('admin/page-faq/update', [PageFaqController::class,'update'])
    ->name('admin_page_faq_update');

Route::get('admin/page-contact/edit', [PageContactController::class,'edit'])
    ->name('admin_page_contact_edit');
Route::post('admin/page-contact/update', [PageContactController::class,'update'])
    ->name('admin_page_contact_update');

Route::get('admin/page-pricing/edit', [PagePricingController::class,'edit'])
    ->name('admin_page_pricing_edit');
Route::post('admin/page-pricing/update', [PagePricingController::class,'update'])
    ->name('admin_page_pricing_update');

Route::get('admin/page-listing-category/edit', [PageListingCategoryController::class,'edit'])
    ->name('admin_page_listing_category_edit');
Route::post('admin/page-listing-category/update', [PageListingCategoryController::class,'update'])
    ->name('admin_page_listing_category_update');

Route::get('admin/page-listing-location/edit', [PageListingLocationController::class,'edit'])
    ->name('admin_page_listing_location_edit');
Route::post('admin/page-listing-location/update', [PageListingLocationController::class,'update'])
    ->name('admin_page_listing_location_update');

Route::get('admin/page-listing/edit', [PageListingController::class,'edit'])
    ->name('admin_page_listing_edit');
Route::post('admin/page-listing/update', [PageListingController::class,'update'])
    ->name('admin_page_listing_update');

Route::get('admin/page-term/edit', [PageTermController::class,'edit'])
    ->name('admin_page_term_edit');
Route::post('admin/page-term/update', [PageTermController::class,'update'])
    ->name('admin_page_term_update');

Route::get('admin/page-privacy/edit', [PagePrivacyController::class,'edit'])
    ->name('admin_page_privacy_edit');
Route::post('admin/page-privacy/update', [PagePrivacyController::class,'update'])
    ->name('admin_page_privacy_update');

Route::get('admin/page-other/edit', [PageOtherController::class,'edit'])
    ->name('admin_page_other_edit');
Route::post('admin/page-other/update', [PageOtherController::class,'update'])
    ->name('admin_page_other_update');



/* --------------------------------------- */
/* FAQ - Admin */
/* --------------------------------------- */
Route::get('admin/faq/view', [FaqControllerForAdmin::class,'index'])
    ->name('admin_faq_view');

Route::get('admin/faq/create', [FaqControllerForAdmin::class,'create'])
    ->name('admin_faq_create');

Route::post('admin/faq/store', [FaqControllerForAdmin::class,'store'])
    ->name('admin_faq_store');

Route::get('admin/faq/delete/{id}', [FaqControllerForAdmin::class,'destroy'])
    ->name('admin_faq_delete');

Route::get('admin/faq/edit/{id}', [FaqControllerForAdmin::class,'edit'])
    ->name('admin_faq_edit');

Route::post('admin/faq/update/{id}', [FaqControllerForAdmin::class,'update'])
    ->name('admin_faq_update');



/* --------------------------------------- */
/* Package - Admin */
/* --------------------------------------- */
Route::get('admin/package/view', [PackageControllerForAdmin::class,'index'])
    ->name('admin_package_view');

Route::get('admin/package/create', [PackageControllerForAdmin::class,'create'])
    ->name('admin_package_create');

Route::post('admin/package/store', [PackageControllerForAdmin::class,'store'])
    ->name('admin_package_store');

Route::get('admin/package/delete/{id}', [PackageControllerForAdmin::class,'destroy'])
    ->name('admin_package_delete');

Route::get('admin/package/edit/{id}', [PackageControllerForAdmin::class,'edit'])
    ->name('admin_package_edit');

Route::post('admin/package/update/{id}', [PackageControllerForAdmin::class,'update'])
    ->name('admin_package_update');



/* --------------------------------------- */
/* Email Template - Admin */
/* --------------------------------------- */
Route::get('admin/email-template/view', [EmailTemplateController::class,'index'])
    ->name('admin_email_template_view');

Route::get('admin/email-template/edit/{id}', [EmailTemplateController::class,'edit'])
    ->name('admin_email_template_edit');

Route::post('admin/email-template/update/{id}', [EmailTemplateController::class,'update'])
    ->name('admin_email_template_update');


/* --------------------------------------- */
/* Social Media - Admin */
/* --------------------------------------- */
Route::get('admin/social-media/view', [SocialMediaItemController::class,'index'])
    ->name('admin_social_media_view');

Route::get('admin/social-media/create', [SocialMediaItemController::class,'create'])
    ->name('admin_social_media_create');

Route::post('admin/social-media/store', [SocialMediaItemController::class,'store'])
    ->name('admin_social_media_store');

Route::get('admin/social-media/delete/{id}', [SocialMediaItemController::class,'destroy'])
    ->name('admin_social_media_delete');

Route::get('admin/social-media/edit/{id}', [SocialMediaItemController::class,'edit'])
    ->name('admin_social_media_edit');

Route::post('admin/social-media/update/{id}', [SocialMediaItemController::class,'update'])
    ->name('admin_social_media_update');




/* --------------------------------------- */
/* Purchase History - Admin */
/* --------------------------------------- */
Route::get('admin/purchase-history/view', [PurchaseHistoryControllerForAdmin::class,'index'])
    ->name('admin_purchase_history_view');

Route::get('admin/purchase-history/detail/{id}', [PurchaseHistoryControllerForAdmin::class,'detail'])
    ->name('admin_purchase_history_detail');

Route::get('admin/purchase-history/invoice/{id}', [PurchaseHistoryControllerForAdmin::class,'invoice'])
    ->name('admin_purchase_history_invoice');



/* --------------------------------------- */
/* Customer - Admin */
/* --------------------------------------- */
Route::get('admin/customer/view', [CustomerControllerForAdmin::class,'index'])
    ->name('admin_customer_view');

Route::get('admin/customer/detail/{id}', [CustomerControllerForAdmin::class,'detail'])
    ->name('admin_customer_detail');

Route::get('admin/customer/delete/{id}', [CustomerControllerForAdmin::class,'destroy'])
    ->name('admin_customer_delete');

Route::get('admin/customer-status/{id}', [CustomerControllerForAdmin::class,'change_status']);



Route::get('admin/clear-database', [ClearDatabaseController::class,'index'])
    ->name('admin_clear_database');