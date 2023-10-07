<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ LOGIN }}</title>

    @include('admin.app_styles')

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    @include('admin.app_scripts')

</head>

    <body class="bg-gradient-primary">
        <div class="container v-center">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">

                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">{{ ADMIN_LOGIN }}</h1>
                                        </div>

                                        <form action="{{ route('admin_login_store') }}" class="user" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input id="email" type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ EMAIL_ADDRESS }}">
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control form-control-user" name="password" placeholder="{{ PASSWORD }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ LOGIN }}</button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="font-weight-bold" href="{{ route('admin_forget_password') }}">{{ FORGET_PASSWORD }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        @include('admin.app_scripts_footer')

</body>
</html>