@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_GENERAL_SETTING }}</h1>

    <form action="{{ route('admin_setting_general_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="current_logo" value="{{ $setting->logo }}">
        <input type="hidden" name="current_favicon" value="{{ $setting->favicon }}">

        <div class="card shadow mb-4 t-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1" role="tab" aria-controls="p1" aria-selected="true">{{ LOGO }}</a>
                            <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab" aria-controls="p2" aria-selected="false">{{ FAVICON }}</a>
                            <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab" aria-controls="p3" aria-selected="false">{{ FOOTER }}</a>
                            <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab" aria-controls="p4" aria-selected="false">{{ GOOGLE_RECAPTCHA }}</a>
                            <a class="nav-link" id="p5_tab" data-toggle="pill" href="#p5" role="tab" aria-controls="p5" aria-selected="false">{{ GOOGLE_ANALYTIC }}</a>
                            <a class="nav-link" id="p6_tab" data-toggle="pill" href="#p6" role="tab" aria-controls="p6" aria-selected="false">{{ TAWK_LIVE_CHAT }}</a>
                            <a class="nav-link" id="p7_tab" data-toggle="pill" href="#p7" role="tab" aria-controls="p7" aria-selected="false">{{ COOKIE_CONSENT }}</a>
                            <a class="nav-link" id="p8_tab" data-toggle="pill" href="#p8" role="tab" aria-controls="p8" aria-selected="false">{{ THEME_COLOR }}</a>
                            <a class="nav-link" id="p9_tab" data-toggle="pill" href="#p9" role="tab" aria-controls="p9" aria-selected="false">{{ CUSTOMER_LISTING_OPTION }}</a>
                            <a class="nav-link" id="p10_tab" data-toggle="pill" href="#p10" role="tab" aria-controls="p10" aria-selected="false">{{ LAYOUT_DIRECTION }}</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="p1_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ EXISTING_LOGO }}</label>
                                    <div>
                                        <img src="{{ asset('public/uploads/site_photos/'.$setting->logo) }}" alt="" class="h_80">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ CHANGE_LOGO }}</label>
                                    <div>
                                        <input type="file" name="logo">
                                    </div>
                                </div>
                                <!-- // Tab Content -->

                            </div>

                            <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ EXISTING_FAVICON }}</label>
                                    <div>
                                        <img src="{{ asset('public/uploads/site_photos/'.$setting->favicon) }}" alt="" class="h_80">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ CHANGE_FAVICON }}</label>
                                    <div>
                                        <input type="file" name="favicon">
                                    </div>
                                </div>
                                <!-- // Tab Content -->

                            </div>




                            <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="p3_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ FOOTER_COLUMN_1_HEADING }}</label>
                                    <input type="text" name="footer_column_1_heading" class="form-control" value="{{ $setting->footer_column_1_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_COLUMN_1_TOTAL_ITEM }}</label>
                                    <input type="text" name="footer_column_1_total_item" class="form-control" value="{{ $setting->footer_column_1_total_item }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_COLUMN_2_HEADING }}</label>
                                    <input type="text" name="footer_column_2_heading" class="form-control" value="{{ $setting->footer_column_2_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_COLUMN_2_TOTAL_ITEM }}</label>
                                    <input type="text" name="footer_column_2_total_item" class="form-control" value="{{ $setting->footer_column_2_total_item }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_COLUMN_3_HEADING }}</label>
                                    <input type="text" name="footer_column_3_heading" class="form-control" value="{{ $setting->footer_column_3_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_COLUMN_4_HEADING }}</label>
                                    <input type="text" name="footer_column_4_heading" class="form-control" value="{{ $setting->footer_column_4_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_ADDRESS }}</label>
                                    <textarea name="footer_address" class="form-control h_70" cols="30" rows="10">{{ $setting->footer_address }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_EMAIL }}</label>
                                    <textarea name="footer_email" class="form-control h_70" cols="30" rows="10">{{ $setting->footer_email }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_PHONE }}</label>
                                    <textarea name="footer_phone" class="form-control h_70" cols="30" rows="10">{{ $setting->footer_phone }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ FOOTER_COPYRIGHT }}</label>
                                    <textarea name="footer_copyright" class="form-control h_70" cols="30" rows="10">{{ $setting->footer_copyright }}</textarea>
                                </div>
                                <!-- // Tab Content -->

                            </div>




                            <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="p4_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ GOOGLE_RECAPTCHA_SITE_KEY }}</label>
                                    <input type="text" name="google_recaptcha_site_key" class="form-control" value="{{ $setting->google_recaptcha_site_key }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ GOOGLE_RECAPTCHA_STATUS }}</label>
                                    <select name="google_recaptcha_status" class="form-control">
                                        <option value="Show" {{ $setting->google_recaptcha_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $setting->google_recaptcha_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
                                </div>
                                <!-- // Tab Content -->

                            </div>



                            <div class="tab-pane fade" id="p5" role="tabpanel" aria-labelledby="p5_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ GOOGLE_ANALYTIC_TRACKING_ID }}</label>
                                    <input type="text" name="google_analytic_tracking_id" class="form-control" value="{{ $setting->google_analytic_tracking_id }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ GOOGLE_ANALYTIC_STATUS }}</label>
                                    <select name="google_analytic_status" class="form-control">
                                        <option value="Show" {{ $setting->google_analytic_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $setting->google_analytic_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
                                </div>
                                <!-- // Tab Content -->

                            </div>


                            <div class="tab-pane fade" id="p6" role="tabpanel" aria-labelledby="p6_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ TAWK_LIVE_CHAT_CODE }}</label>
                                    <input type="text" name="tawk_live_chat_property_id" class="form-control" value="{{ $setting->tawk_live_chat_property_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ TAWK_LIVE_CHAT_STATUS }}</label>
                                    <select name="tawk_live_chat_status" class="form-control">
                                        <option value="Show" {{ $setting->tawk_live_chat_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $setting->tawk_live_chat_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
                                </div>
                                <!-- // Tab Content -->

                            </div>


                            <div class="tab-pane fade" id="p7" role="tabpanel" aria-labelledby="p7_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_MESSAGE }}</label>
                                    <textarea name="cookie_consent_message" class="form-control h_70" cols="30" rows="10">{{ $setting->cookie_consent_message }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_BUTTON_TEXT }}</label>
                                    <input type="text" name="cookie_consent_button_text" class="form-control" value="{{ $setting->cookie_consent_button_text }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_TEXT_COLOR }}</label>
                                    <input type="text" name="cookie_consent_text_color" class="form-control jscolor" value="{{ $setting->cookie_consent_text_color }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_BACKGROUND_COLOR }}</label>
                                    <input type="text" name="cookie_consent_bg_color" class="form-control jscolor" value="{{ $setting->cookie_consent_bg_color }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_BUTTON_TEXT_COLOR }}</label>
                                    <input type="text" name="cookie_consent_button_text_color" class="form-control jscolor" value="{{ $setting->cookie_consent_button_text_color }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_BUTTON_BACKGROUND_COLOR }}</label>
                                    <input type="text" name="cookie_consent_button_bg_color" class="form-control jscolor" value="{{ $setting->cookie_consent_button_bg_color }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ COOKIE_CONSENT_STATUS }}</label>
                                    <select name="cookie_consent_status" class="form-control">
                                        <option value="Show" {{ $setting->cookie_consent_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $setting->cookie_consent_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
                                </div>
                                <!-- // Tab Content -->

                            </div>




                            <div class="tab-pane fade" id="p8" role="tabpanel" aria-labelledby="p8_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ THEME_COLOR }}</label>
                                    <input type="text" name="theme_color" class="form-control jscolor" value="{{ $setting->theme_color }}">
                                </div>
                                <!-- // Tab Content -->

                            </div>



                            <div class="tab-pane fade" id="p9" role="tabpanel" aria-labelledby="p9_tab">

                                <!-- Tab Content -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">{{ CUSTOMER_LISTING }}</label>
                                            <select name="customer_listing_option" class="form-control">
                                                <option value="On" @if($setting->customer_listing_option == 'On') selected @endif>{{ ON }}</option>
                                                <option value="Off" @if($setting->customer_listing_option == 'Off') selected @endif>{{ OFF }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab Content -->

                            </div>


                            <div class="tab-pane fade" id="p10" role="tabpanel" aria-labelledby="p10_tab">

                                <!-- Tab Content -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">{{ LAYOUT_DIRECTION }}</label>
                                            <select name="layout_direction" class="form-control">
                                                <option value="ltr" @if($setting->layout_direction == 'ltr') selected @endif>{{ LTR }}</option>
                                                <option value="rtl" @if($setting->layout_direction == 'rtl') selected @endif>{{ RTL }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab Content -->

                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-block mb_50">{{ UPDATE }}</button>

    </form>

@endsection
