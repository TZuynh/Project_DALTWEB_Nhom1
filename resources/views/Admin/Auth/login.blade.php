<head>
    <meta charset="utf-8">
    <title>Đăng Nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Zoyothemes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="bg-primary-subtle" data-sidebar="hidden">
<!-- Begin page -->
<div class="account-page">
    <div class="container-fluid p-0">
        <div class="row align-items-center g-0">
            <div class="col-xl-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card p-3 mb-0">
                            <div class="card-body">
                                <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                    <div class="mb-4 p-0 text-center">
                                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-dark" class="mx-auto" height="28">
                                    </div>

                                    <div class="auth-title-section mb-3 text-center">
                                        <h3 class="text-dark fs-20 fw-medium mb-2">Welcome</h3>
                                        <p class="text-dark text-capitalize fs-14 mb-0">Sign in to continue</p>
                                    </div>

                                    <!-- Show Error -->
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <!-- Form Login -->
                                    <form action="{{ route('admin.login.submit') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="username" class="form-label">Tài Khoản</label>
                                            <input class="form-control" type="text" id="username" name="username" required placeholder="Nhập tài khoản">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Mật Khẩu</label>
                                            <input class="form-control" type="password" id="password" name="password" required placeholder="Nhập mật khẩu">
                                        </div>

                                        <div class="form-group d-flex mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                    <label class="form-check-label" for="checkbox-signin">Nhớ mật khẩu</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit"> Đăng Nhập </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7">
                <div class="account-page-bg p-md-5 p-4">
                    <div class="text-center">
                        <div class="auth-image">
                            <img src="{{ asset('assets/images/auth-images.svg') }}" class="mx-auto img-fluid" alt="images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>

