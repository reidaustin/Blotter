<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>User Login | Blotter</title>
    <link rel="stylesheet" href="{{ asset('./assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('./assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('./assets/css/demo.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('./assets/vendor/css/pages/page-auth.css') }}">
    <!-- Helpers -->
    <script src="{{ asset('./assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('./assets/js/config.js') }}"></script>
</head>

<body>


    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">Blotter</span>
                            </a>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to Blotter! 👋</h4>
                        <p class="mb-4">Please sign-in to your account.</p>
                        <form action="{{ route('login.process') }}" method="post" class="mb-3">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus>
                                    <span class="text-danger">{{$errors->first('email')}}</span>

                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />

                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <span class="text-danger">{{$errors->first('password')}}</span>

                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                            </div>
                        </form>
                        <p class="text-center">
                            <span>Don't have an account?</span>
                            <a href="{{ route('register') }}">
                                <span>User Register</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('./assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('./assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('./assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('./assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <!-- Main JS -->
    <script src="{{ asset('./assets/js/main.js') }}"></script>
    <!-- Page JS -->
</body>

</html>
