@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_EMAIL_TEMPLATE }}</h1>

    <form action="{{ route('admin_email_template_update',$email_template->id) }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_email_template_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">{{ SUBJECT }} *</label>
                            <input type="text" name="et_subject" class="form-control" value="{{ $email_template->et_subject }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CONTACT_PAGE_MESSAGE }} *</label>
                            <textarea name="et_content" class="form-control editor" cols="30" rows="10">{{ $email_template->et_content }}</textarea>

                            <div class="font-weight-bold mt_20 text-danger">{{ PARAMETERS_YOU_CAN_USE }} </div>

                            @if($id == 1)
                            <div>[[visitor_name]] = {{ VISITOR_NAME }}</div>
                            <div>[[visitor_email]] = {{ VISITOR_EMAIL }}</div>
                            <div>[[visitor_phone]] = {{ VISITOR_PHONE }}</div>
                            <div>[[visitor_message]] = {{ VISITOR_MESSAGE }}</div>

                            @elseif($id == 2)
                            <div>[[person_name]] = {{ COMMENTER_NAME }}</div>
                            <div>[[person_email]] = {{ COMMENTER_EMAIL }}</div>
                            <div>[[person_comment]] = {{ COMMENTER_MESSAGE }}</div>
                            <div>[[comment_see_url]] = {{ ADMIN_PANEL_LINK_TO_SEE_COMMENT }}</div>
                            
                            @elseif($id == 5)
                            <div>[[reset_link]] = {{ RESET_PASSWORD_PAGE_LINK }}</div>

                            @elseif($id == 6)
                            <div>[[verification_link]] = {{ CUSTOMER_REGISTRATION_VERIFY_LINK }}</div>

                            @elseif($id == 7)
                            <div>[[reset_link]] = {{ RESET_PASSWORD_PAGE_LINK }}</div>

                            @elseif($id == 8)
                            <div>[[customer_name]] = {{ CUSTOMER_NAME }}</div>
                            <div>[[payment_method]] = {{ PAYMENT_METHOD }}</div>
                            <div>[[package_start_date]] = {{ PACKAGE_START_DATE }}</div>
                            <div>[[package_end_date]] = {{ PACKAGE_END_DATE }}</div>
                            <div>[[transaction_id]] = {{ TRANSACTION_ID }}</div>
                            <div>[[paid_amount]] = {{ PAID_AMOUNT }}</div>
                            <div>[[payment_status]] = {{ PAYMENT_STATUS }}</div>


                            @elseif($id == 9)
                                <div>[[agent_name]] = {{ AGENT_NAME }}</div>
                                <div>[[listing_name]] = {{ LISTING_NAME }}</div>
                                <div>[[listing_url]] = {{ LISTING_URL }}</div>
                                <div>[[name]] = {{ VISITOR_NAME }}</div>
                                <div>[[email]] = {{ VISITOR_EMAIL }}</div>
                                <div>[[phone]] = {{ VISITOR_PHONE }}</div>
                                <div>[[message]] = {{ VISITOR_MESSAGE }}</div>


                            @elseif($id == 10)
                                <div>[[listing_name]] = {{ LISTING_NAME }}</div>
                                <div>[[listing_url]] = {{ LISTING_URL }}</div>
                                <div>[[name]] = {{ VISITOR_NAME }}</div>
                                <div>[[email]] = {{ VISITOR_EMAIL }}</div>
                                <div>[[phone]] = {{ VISITOR_PHONE }}</div>
                                <div>[[message]] = {{ VISITOR_MESSAGE }}</div>
                            @endif

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
            </div>
        </div>
    </form>

@endsection
