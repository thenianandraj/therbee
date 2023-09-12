<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="container bg-color">
                            <nav class="navbar navbar-expand-md bg-color">
                                <a class="btn btn-danger nav-link" href="{{ url('/') }}">
                                 {{ config('app.name', 'Laravel') }}
                             </a> &nbsp;&nbsp;&nbsp;
                             <a class="btn btn-danger nav-link" href="{{ route('login') }}" >Login</a>&nbsp;&nbsp;&nbsp;
                             <a class="btn btn-danger nav-link" href="{{ route('register') }}">Register</a>
                             </nav><br><br>
                        </div>
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="../../images/WoodenLogo.jpg">
                            </div>
                            <h4 class="text-align-center">LOGIN</h4>
                            <form class="pt-3" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="email" id="email"
                                        class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" name="email"
                                        autofocus placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}
                                                class="form-check-input"> Keep me signed in </label>
                                    </div>
                                    @if(Route::has('password.request'))
                                        <a class="auth-link text-black"
                                            href="{{ route('password.request') }}">
                                            Forgot password?
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>