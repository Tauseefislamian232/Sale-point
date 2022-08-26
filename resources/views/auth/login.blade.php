<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | POS - Admin & Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-white p-4">
                                        <h5 class="text-white">Welcome Back !</h5>
                                        <p>Sign in to Point of Sale.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                {{-- <a href="index.html" class="auth-logo-light">
                                            <div class="avatar-md profile-user-wid mb-4">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <img src="assets/images/logo3.png" alt="" class="rounded-circle"
                                                        height="34">
                                                </span>
                                            </div>
                                        </a> --}}

                                <a href="{{ route('home') }}" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo2.png" alt="" class="rounded-circle"
                                                height="66">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">


                                <form method="POST" class="form-control" action="{{ route('login') }}">
                                    @csrf

                                    <div class=" mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <div class="">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            {{ __('Login') }}
                                        </button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 ">Sign in with</h5>

                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript::void()"
                                                    class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()"
                                                    class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()"
                                                    class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-muted">
                                                <i class="mdi mdi-lock me-1"></i>
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        <p>Don't have an account ? <a href="{{ route('register') }}"
                                                class="fw-medium text-primary">
                                                Signup now </a>
                                        </p>
                                    </div>


                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        {{-- <div>
                                    <p>Don't have an account ? <a href="{{ route('register') }}"
                                            class="fw-medium text-primary">
                                            Signup now </a>
                                        </p>
                                    <p>©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> Skote. Crafted with <i
                                            class="mdi mdi-heart text-danger"></i> by Themesbrand
                                    </p>
                                </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>
