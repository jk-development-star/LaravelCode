@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_PAYMENT_SETTING }}</h1>

    <form action="{{ route('admin_payment_update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">{{ PAYPAL }}</h6>
                    </div>
                    <div class="card-body">                        
                        <div class="form-group">
                            <label for="">{{ PAYPAL_ENVIRONMENT }}</label>
                            <select name="paypal_environment" class="form-control">
                                <option value="sandbox" @if($g_setting->paypal_environment == 'sandbox') selected @endif>{{ SANDBOX }}</option>
                                <option value="production" @if($g_setting->paypal_environment == 'production') selected @endif>{{ PRODUCTION }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">{{ PAYPAL_CLIENT_ID }}</label>
                            <input type="text" class="form-control" name="paypal_client_id" value="{{ $g_setting->paypal_client_id }}">
                        </div>
                        <div class="form-group">
                            <label for="">{{ PAYPAL_SECRET_KEY }}</label>
                            <input type="text" class="form-control" name="paypal_secret_key" value="{{ $g_setting->paypal_secret_key }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">{{ STRIPE }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">{{ STRIPE_PUBLIC_KEY }}</label>
                            <input type="text" class="form-control" name="stripe_public_key" value="{{ $g_setting->stripe_public_key }}">
                        </div>
                        <div class="form-group">
                            <label for="">{{ STRIPE_SECRET_KEY }}</label>
                            <input type="text" class="form-control" name="stripe_secret_key" value="{{ $g_setting->stripe_secret_key }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">{{ UPDATE }}</button>
    </form>

@endsection