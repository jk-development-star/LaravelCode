@extends('admin.app_admin')

@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_HOME_PAGE_INFO }}</h1>

    <form action="{{ route('admin_page_home_update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_photo" value="{{ $page_home->search_background }}">

        <div class="card shadow mb-4 t-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1" role="tab" aria-controls="p1" aria-selected="true">{{ SEO_SECTION }}</a>
                            <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab" aria-controls="p2" aria-selected="false">{{ SEARCH_SECTION }}</a>
                            <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab" aria-controls="p3" aria-selected="false">{{ CATEGORY_SECTION }}</a>
                            <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab" aria-controls="p4" aria-selected="false">{{ LISTING_SECTION }}</a>
                            <a class="nav-link" id="p5_tab" data-toggle="pill" href="#p5" role="tab" aria-controls="p5" aria-selected="false">{{ LOCATION_SECTION }}</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="p1_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ TITLE }}</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_home->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ META_DESCRIPTION }}</label>
                                    <textarea name="seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $page_home->seo_meta_description }}</textarea>
                                </div>
                                <!-- // Tab Content -->

                            </div>

                            <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ SEARCH_HEADING }}</label>
                                    <textarea name="search_heading" class="form-control h_70" cols="30" rows="10">{{ $page_home->search_heading }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ SEARCH_TEXT }}</label>
                                    <textarea name="search_text" class="form-control h_70" cols="30" rows="10">{{ $page_home->search_text }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ EXISTING_SEARCH_BACKGROUND }}</label>
                                    <div>
                                        <img src="{{ asset('public/uploads/site_photos/'.$page_home->search_background) }}" alt="" class="w_200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ CHANGE_SEARCH_BACKGROUND }}</label>
                                    <div>
                                        <input type="file" name="search_background">
                                    </div>
                                </div>
                                <!-- // Tab Content -->

                            </div>




                            <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="p3_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ HEADING }}</label>
                                    <input type="text" name="category_heading" class="form-control" value="{{ $page_home->category_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ SUBHEADING }}</label>
                                    <input type="text" name="category_subheading" class="form-control" value="{{ $page_home->category_subheading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ TOTAL_ITEMS }}</label>
                                    <input type="text" name="category_total" class="form-control" value="{{ $page_home->category_total }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ STATUS }}</label>
                                    <select name="category_status" class="form-control">
                                        <option value="Show" {{ $page_home->category_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $page_home->category_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
                                </div>

                                <!-- // Tab Content -->

                            </div>




                            <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="p4_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ HEADING }}</label>
                                    <input type="text" name="listing_heading" class="form-control" value="{{ $page_home->listing_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ SUBHEADING }}</label>
                                    <input type="text" name="listing_subheading" class="form-control" value="{{ $page_home->listing_subheading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ STATUS }}</label>
                                    <select name="listing_status" class="form-control">
                                        <option value="Show" {{ $page_home->listing_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $page_home->listing_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
                                </div>

                                <!-- // Tab Content -->

                            </div>



                            <div class="tab-pane fade" id="p5" role="tabpanel" aria-labelledby="p5_tab">

                                <!-- Tab Content -->
                                <div class="form-group">
                                    <label for="">{{ HEADING }}</label>
                                    <input type="text" name="location_heading" class="form-control" value="{{ $page_home->location_heading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ SUBHEADING }}</label>
                                    <input type="text" name="location_subheading" class="form-control" value="{{ $page_home->location_subheading }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ TOTAL_ITEMS }}</label>
                                    <input type="text" name="location_total" class="form-control" value="{{ $page_home->location_total }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ STATUS }}</label>
                                    <select name="location_status" class="form-control">
                                        <option value="Show" {{ $page_home->location_status == 'Show' ? 'selected' : '' }}>{{ SHOW }}</option>
                                        <option value="Hide" {{ $page_home->location_status == 'Hide' ? 'selected' : '' }}>{{ HIDE }}</option>
                                    </select>
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
