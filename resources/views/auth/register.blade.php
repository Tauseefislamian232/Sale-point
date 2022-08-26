<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | POS - Admin & Dashboard</title>
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
                                        <h5 class="text-white">Free Register</h5>
                                        <p class="text-white">Get your free Point of Sale account now.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
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
                                <form class="needs-validation" novalidate method="POST"
                                    action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" placeholder="Enter username" required
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        {{-- <div class="invalid-feedback">
                                            Please Enter Username
                                        </div> --}}
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" id="useremail" placeholder="Enter email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" required>
                                        {{-- <div class="invalid-feedback">
                                            Please Enter Email
                                        </div> --}}
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">{{ __('Password') }}</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" id="userpassword"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" autocomplete="new-password" placeholder="Enter password"
                                                value="{{ old('password') }}" required>
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                            {{-- <div class="invalid-feedback">
                                            Please Enter Password
                                        </div> --}}
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword" for="password-confirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">{{ __('Register') }}</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign up using</h5>

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

                                    {{-- <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#"
                                                class="text-primary">Terms of Use</a></p>
                                    </div> --}}
                                </form>
                            </div>

                        </div>
                        <div class="text-center">
                            <p>Already have an account ? <a href="{{ route('login') }}"
                                    class="fw-medium text-primary">
                                    Login</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        {{-- <p>Already have an account ? <a href="auth-login.html" class="fw-medium text-primary"> Login</a>
                            </p> --}}
                        {{-- <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Themesbrand
                            </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
