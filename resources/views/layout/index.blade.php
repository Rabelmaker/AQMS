@php
    $title = "Air Quality Monitoring Systems";
@endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('/theme/cork') }}/laravel/plugins/waves/waves.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/theme/cork') }}/laravel/plugins/highlight/styles/monokai-sublime.css">
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/perfect-scrollbar.682153c9.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/perfect-scrollbar.682153c9.css"/>


    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/plugins/table/datatable/datatables.css">
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/dt-global_style.61725b7b.css"/>
    <link rel="stylesheet" href="h{{ asset('/theme/cork') }}/laravel/build/assets/dt-global_style.61725b7b.css"/>
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom_dt_custom.6503c76e.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom_dt_custom.6503c76e.css"/>
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/dt-global_style.485b97f9.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/dt-global_style.485b97f9.css"/>
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom_dt_custom.d29e6f13.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom_dt_custom.d29e6f13.css"/>


    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/structure.6ac30bc7.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/structure.6dfd760a.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/structure.6ac30bc7.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/structure.6dfd760a.css"/>

    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/scrollspyNav.326657de.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/scrollspyNav.4a7b7b07.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/scrollspyNav.4a7b7b07.css"/>

    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/plugins/apex/apexcharts.css">

    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/list-group.8fe0ce4c.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/list-group.8fe0ce4c.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/modules-widgets.1baf2021.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/modules-widgets.1baf2021.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/list-group.40423aa1.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/list-group.40423aa1.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/modules-widgets.438cac09.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/modules-widgets.438cac09.css"/>
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/plugins/sweetalerts2/sweetalerts2.css">
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.7039cdf5.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.7039cdf5.css"/>
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.fba5cd51.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-sweetalert.fba5cd51.css"/>

    <link href="{{ asset('/theme/cork') }}laravel/build/vendors/iconic-fonts/font-awesome/css/all.min.css"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}laravel/build/vendors/iconic-fonts/flat-icons/flaticon.css">

    <link href="{{ asset('/theme/cork') }}laravel/build/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('/theme/cork') }}laravel/build/css/jquery-ui.min.css" rel="stylesheet">

    <link href="{{ asset('/theme/cork') }}laravel/build/css/style.css" rel="stylesheet">

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/carousel.c75f7dc1.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/carousel.c75f7dc1.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/modal.792ba9aa.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/modal.792ba9aa.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/tabs.b002aa95.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/tabs.b002aa95.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/carousel.d818448e.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/carousel.d818448e.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/modal.fe8cc74a.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/modal.fe8cc74a.css"/>
    <link rel="preload" as="style" href="{{ asset('/theme/cork') }}/laravel/build/assets/tabs.6ae6b027.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/tabs.6ae6b027.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/plugins/animate/animate.css">
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/plugins/filepond/filepond.min.css">
    <link rel="stylesheet"
          href="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginImagePreview.min.css">
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-filepond.9e9ad299.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-filepond.9e9ad299.css"/>
    <link rel="preload" as="style"
          href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-filepond.ba473b1c.css"/>
    <link rel="stylesheet" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom-filepond.ba473b1c.css"/>
    <!--  END CUSTOM STYLE FILE  -->
    <!-- END GLOBAL MANDATORY STYLES -->

</head>

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


<!--  BEGIN NAVBAR  -->
<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">

        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <div class="search-animated toggle-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <form class="form-inline search-full form-inline search" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x search-close">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </form>
            <span class="badge badge-secondary">Ctrl + /</span>
        </div>

        <ul class="navbar-item flex-row ms-lg-auto ms-0">

            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-moon dark-mode">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-sun light-mode">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </a>
            </li>


        </ul>
    </header>
</div>                <!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container " id="container">

    <!--  BEGIN LOADER  -->
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>            <!--  END LOADER  -->


    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">

            <div class="navbar-nav theme-brand flex-row  text-center">
                <div class="nav-logo">
                    <div class="nav-item theme-logo">
                        <a href="/cork/laravel/modern-dark-menu/dashboard/analytics">
                            <img src="{{ asset('/theme/cork') }}/laravel/build/assets/logo.87d1e3bb.svg"
                                 class="navbar-logo logo-dark" alt="logo">
                            <img src="{{ asset('/theme/cork') }}/laravel/build/assets/logo2.25baa396.svg"
                                 class="navbar-logo logo-light" alt="logo">
                        </a>
                    </div>
                    <div class="nav-item theme-text">
                        <a href="/cork/laravel/modern-dark-menu/dashboard/analytics" class="nav-link"> CORK </a>
                    </div>
                </div>
                <div class="nav-item sidebar-toggle">
                    <div class="btn-toggle sidebarCollapse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevrons-left">
                            <polyline points="11 17 6 12 11 7"></polyline>
                            <polyline points="18 17 13 12 18 7"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="profile-info">
                <div class="user-info">
                    <div class="profile-img">
                        <img src="{{ asset('/theme/cork') }}/laravel/build/assets/profile-30.cc6a2fe6.png" alt="avatar">
                    </div>
                    <div class="profile-content">
                        <h6 class="">Shaun Park</h6>
                        <p class="">Project Leader</p>
                    </div>
                </div>
            </div>
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu active">
                    <a href="{{ route('dashboard') }}" data-bs-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <div class="">
                            <i data-feather="activity"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>

                </li>

                <li class="menu menu-heading">
                    <div class="heading">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>APPLICATIONS</span></div>
                </li>

                <li class="menu ">
                    <a href="{{ route('akun') }}" aria-expanded="{{ request()->routeIs('akun') ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Tabel Akun</span>
                        </div>
                    </a>
                </li>

                <li class="menu ">
                    <a href="{{ route('alat') }}" aria-expanded="{{ request()->routeIs('alat') ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-smartphone">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                            <span>Tabel Device</span>
                        </div>
                    </a>
                </li>

                <li class="menu ">
                    <a href="{{ route('parameter') }}"
                       aria-expanded="{{ request()->routeIs('parameter') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-codesandbox">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                                <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                                <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Tabel Parameter</span>
                        </div>
                    </a>
                </li>

                <li class="menu menu-heading">
                    <div class="heading">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>AUTHENTICATION</span></div>
                </li>

                <li class="menu ">
                    <a href="javascript:void(0);" onclick="logout()" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Log out</span>
                        </div>
                    </a>
                </li>


            </ul>

        </nav>

    </div>                    <!--  END SIDEBAR  -->


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content ">

        @yield('content')

        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2023</span> <a target="_blank"
                                                                                  href="{{ asset('/theme/cork') }}-admin/">AkbarMaulana</a>,
                    2055201076.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </p>
            </div>
        </div>                <!--  END FOOTER  -->

    </div>
    <!--  END CONTENT AREA  -->

</div>
<!--  END MAIN CONTAINER  -->


<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="{{ asset('/theme/cork') }}/laravel/plugins/bootstrap/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/mousetrap/mousetrap.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/waves/waves.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/highlight/highlight.pack.js"></script>

<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/app.e5f7dcf7.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/app.e5f7dcf7.js"></script>
<!-- END GLOBAL MANDATORY STYLES -->


<script src="{{ asset('/theme/cork') }}/laravel/plugins/apex/apexcharts.min.js"></script>


<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/_wSix.8606dce5.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/_wSix.8606dce5.js"></script>
<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/_wChartThree.2fe722cd.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/_wChartThree.2fe722cd.js"></script>
<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/_wHybridOne.ff7ea50b.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/_wHybridOne.ff7ea50b.js"></script>
<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/_wActivityFive.c9c0812e.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/_wActivityFive.c9c0812e.js"></script>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/plugins/global/vendors.min.js"></script>
<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/custom.f90a5296.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/custom.f90a5296.js"></script>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/plugins/table/datatable/datatables.js"></script>
<link rel="modulepreload" href="{{ asset('/theme/cork') }}/laravel/build/assets/scrollspyNav.2f130a3c.js"/>
<script type="module" src="{{ asset('/theme/cork') }}/laravel/build/assets/scrollspyNav.2f130a3c.js"></script>

<!-- Global Required Scripts Start -->
<script src="{{ asset('/theme/cork') }}/laravel/build/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/popper.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/bootstrap.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/perfect-scrollbar.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/build/js/jquery-ui.min.js"></script>
<!-- Global Required Scripts End -->

<!-- Weedo core JavaScript -->
<script src="{{ asset('/theme/cork') }}/laravel/build/js/framework.js"></script>

<!-- Settings -->
<script src="{{ asset('/theme/cork') }}/laravel/build/js/settings.js"></script>

<script src="{{ asset('/theme/cork') }}/laravel/plugins/editors/quill/quill.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/filepond.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginFileValidateType.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginImageExifOrientation.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginImagePreview.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginImageCrop.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginImageResize.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/FilePondPluginImageTransform.min.js"></script>
<script src="{{ asset('/theme/cork') }}/laravel/plugins/filepond/filepondPluginFileValidateSize.min.js"></script>

<script type="module">
    // var e;
    const c1 = $('#style-1').DataTable({
        headerCallback: function (e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML = `
                    <div class="form-check form-check-primary d-block">
                        <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                    </div>`
        },
        columnDefs: [{
            targets: 0, width: "30px", className: "", orderable: !1, render: function (e, a, t, n) {
                return `
                        <div class="form-check form-check-primary d-block">
                            <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                        </div>`
            }
        }],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10
    });

    multiCheck(c1);

    const c2 = $('#style-2').DataTable({
        headerCallback: function (e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML = `
                    <div class="form-check form-check-primary d-block new-control">
                        <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                    </div>`
        },
        columnDefs: [{
            targets: 0, width: "30px", className: "", orderable: !1, render: function (e, a, t, n) {
                return `
                        <div class="form-check form-check-primary d-block new-control">
                            <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                        </div>`
            }
        }],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10
    });

    multiCheck(c2);

    const c3 = $('#style-3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10
    });

    multiCheck(c3);
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    @if(session('sukses'))
    $(document).ready(function () {
        Swal.fire({
            title: 'Success',
            text: '{{ session('sukses') }}',
            type: 'success',
            showConfirmButton: false,
            timer: 3000,
            position: 'top-end',
        });
    });
    @endif
    @if(session('gagal'))
    $(document).ready(function () {
        Swal.fire({
            title: 'Error',
            text: '{{ session('gagal') }}',
            type: 'error',
            showConfirmButton: false,
            timer: 3000,
            position: 'top-end',
        });
    });
    @endif

    function logout() {
        Swal.fire({
            title: 'Anda yakin !',
            text: "Akan keluar dari akun ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout'
        }).then((result) => {
            if(result.value){
                var url = '{{ route('logout') }}';
                location.replace(url);
            }
        });
    }

    function hapus(url, pesan) {
        Swal.fire({
            title: 'Anda yakin !!!',
            text: pesan,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                location.replace(url);
            }
        });
    }

    function verifikasi(url, pesan) {
        Swal.fire({
            title: 'Anda yakin !!!',
            text: pesan,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Verifikasi !'
        }).then((result) => {
            if (result.value) {
                location.replace(url);
            }
        });
    }


</script>
<script type="module">

    function addVideoInModal(btnSelector, videoSource, modalSelector, iframeHeight, iframeWidth, iframeContainer) {
        var myModal = new bootstrap.Modal(document.getElementById(modalSelector), {
            keyboard: false
        })
        document.querySelector(btnSelector).addEventListener('click', function() {
            var src = videoSource;
            myModal.show('show');
            var ifrm = document.createElement("iframe");
            ifrm.setAttribute("src", src);
            ifrm.setAttribute('width', iframeWidth);
            ifrm.setAttribute('height', iframeHeight);
            ifrm.style.border = "0";
            ifrm.setAttribute("allow", "encrypted-media");
            document.querySelector(iframeContainer).appendChild(ifrm);
        })
    }

    addVideoInModal('#yt-video-link', 'https://www.youtube.com/embed/YE7VzlLtp-4', 'videoMedia1', '315', '560', '.yt-container')

    addVideoInModal('#vimeo-video-link', 'https://player.vimeo.com/video/1084537', 'videoMedia2', '315', '560', '.vimeo-container')




    /**
     * ==================
     * Single File Upload
     * ==================
     */

    // We register the plugins required to do
    // image previews, cropping, resizing, etc.
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform,
        //   FilePondPluginImageEdit
    );

    // Select the file input and use
    // create() to turn it into a pond
    var modalImage = FilePond.create(
        document.querySelector('.filepond'),
        {
            // labelIdle: `<span class="no-image-placeholder"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span> <p class="drag-para">Drag & Drop your picture or <span class="filepond--label-action" tabindex="0">Browse</span></p>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        }
    );

    const myModalEl = document.getElementById('profileModal')
    myModalEl.addEventListener('shown.bs.modal', event => {
        modalImage.addFiles("{{ asset('/theme/cork') }}/laravel/build/assets/drag-1.abc14241.jpeg");
    })

</script>


</body>
</html>
