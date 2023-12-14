<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SignIn Boxed | CORK - Multipurpose Bootstrap Dashboard Template</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/theme/cork') }}/laravel/build/assets/favicon.34dd7cba.ico"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/loader.c40a282a.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/loader.c40a282a.css"/>
    <link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/loader.ebb4c7c9.js"/>
    <script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/loader.ebb4c7c9.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/theme/cork') }}/laravel/plugins/bootstrap/bootstrap.min.css">
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/main.72b3e3e6.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/main.b0573015.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/main.72b3e3e6.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/main.b0573015.css"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/auth-cover.4fc1d63d.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/auth-cover.4fc1d63d.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/auth-cover.5fd79c32.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/auth-cover.5fd79c32.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/plugins/sweetalerts2/sweetalerts2.css">
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.7039cdf5.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.7039cdf5.css"/>
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.fba5cd51.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.fba5cd51.css"/>

    <link href="{{ asset('/theme/cork') }}laravel/build/vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}laravel/build/vendors/iconic-fonts/flat-icons/flaticon.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/theme/cork') }}laravel/build/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="{{ asset('/theme/cork') }}laravel/build/css/jquery-ui.min.css" rel="stylesheet">
    <!-- Weedo styles -->
    <link href="{{ asset('/theme/cork') }}laravel/build/css/style.css" rel="stylesheet">
    <!--  END CUSTOM STYLE FILE  -->
    <!-- END GLOBAL MANDATORY STYLES -->
</head>
<body class="layout-boxed">

<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>    <!--  END LOADER -->


<!-- BEGIN GLOBAL MANDATORY STYLES -->
<!-- END GLOBAL MANDATORY STYLES -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div
                class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                <div class="auth-cover-bg-image"></div>
                <div class="auth-overlay"></div>

                <div class="auth-cover">

                    <div class="position-relative">

                        <img src="{{ asset('/theme/cork') }}/laravel/build/assets/logo_unilak.png"
                             alt="auth-img" style="width: 50%; height: auto;">

                        <h2 class="mt-5 text-white font-weight-bolder px-2">Join the community of expert developers</h2>
                        <p class="text-white px-2">It is easy to set up with great customer experience. Start your 7-day
                            free trial</p>
                    </div>

                </div>

            </div>

            <div
                class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>Sign In</h2>
                                <p>Enter your email and password to login</p>

                            </div>
                            <form method="post" action="{{ route('post_login') }}">
                                @csrf
                                <div class="col-md-12">


                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username"
                                               placeholder="Enter Username" value="">
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="Enter Password" value="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">Don't have an account ? <a href="javascript:void(0);"
                                                                                class="text-warning">Sign Up</a></p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Global Required Scripts Start -->
<script src="{{ asset('/theme/cork') }}/laravel/build/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/popper.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/bootstrap.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/perfect-scrollbar.js"> </script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/jquery-ui.min.js"> </script>
<!-- Global Required Scripts End -->

<!-- Weedo core JavaScript -->
<script src="{{ asset('/theme/cork') }}/laravel/build/js/framework.js"></script>

<!-- Settings -->
<script src="{{ asset('/theme/cork') }}/laravel/build/js/settings.js"></script>


<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<!--  END CUSTOM SCRIPTS FILE  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    @if(session('error'))
    $(document).ready(function () {
        Swal.fire({
            title: 'Maaf !!!',
            text: 'Username / Password salah',
            type: 'error',
            showConfirmButton: true,
            timer: 3000
        });
    });
    @endif

</script>

</body>
</html>
