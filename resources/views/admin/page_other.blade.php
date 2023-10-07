@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_OTHER_PAGE_INFO }}</h1>

    <form action="{{ route('admin_page_other_update') }}" method="post">
    @csrf
    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1" role="tab" aria-controls="p1" aria-selected="true">{{ LOGIN_PAGE }}</a>
                        <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab" aria-controls="p2" aria-selected="false">{{ REGISTRATION_PAGE }}</a>
                        <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab" aria-controls="p3" aria-selected="false">{{ FORGET_PASSWORD_PAGE }}</a>
                        <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab" aria-controls="p4" aria-selected="false">{{ CUSTOMER_PANEL }}</a>

                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">


                        <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="p1_tab">
                            <!-- Tab -->
                            <div class="form-group">
                                <label for="">{{ TITLE }}</label>
                                <input type="text" name="login_page_seo_title" class="form-control" value="{{ $page_other->login_page_seo_title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ META_DESCRIPTION }}</label>
                                <textarea name="login_page_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $page_other->login_page_seo_meta_description }}</textarea>
                            </div>
                            <!-- // Tab -->
                        </div>

                        <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2_tab">
                            <!-- Tab -->
                            <div class="form-group">
                                <label for="">{{ TITLE }}</label>
                                <input type="text" name="registration_page_seo_title" class="form-control" value="{{ $page_other->registration_page_seo_title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ META_DESCRIPTION }}</label>
                                <textarea name="registration_page_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $page_other->registration_page_seo_meta_description }}</textarea>
                            </div>
                            <!-- // Tab -->
                        </div>


                        <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="p3_tab">
                            <!-- Tab -->
                            <div class="form-group">
                                <label for="">{{ TITLE }}</label>
                                <input type="text" name="forget_password_page_seo_title" class="form-control" value="{{ $page_other->forget_password_page_seo_title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ META_DESCRIPTION }}</label>
                                <textarea name="forget_password_page_seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other->forget_password_page_seo_meta_description }}</textarea>
                            </div>
                            <!-- // Tab -->
                        </div>


                        <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="p4_tab">
                            <!-- Tab -->
                            <div class="form-group">
                                <label for="">{{ TITLE }}</label>
                                <input type="text" name="customer_panel_page_seo_title" class="form-control" value="{{ $page_other->customer_panel_page_seo_title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ META_DESCRIPTION }}</label>
                                <textarea name="customer_panel_page_seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other->customer_panel_page_seo_meta_description }}</textarea>
                            </div>
                            <!-- // Tab -->
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block">{{ UPDATE }}</button>
    </form>
@endsection
