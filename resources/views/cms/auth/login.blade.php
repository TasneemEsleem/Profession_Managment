<!DOCTYPE html>
<html class="loading" @if (app()->getLocale()=='en') lang="en"
data-textdirection="ltr" 
@else lang="ar" 
data-textdirection="rtl"
@endif >
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{__('cms.Login')}} - {{__('cms.FreeLancing')}}</title>
    <link rel="apple-touch-icon" href="{{asset('cms/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cms/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    @if (app()->getLocale()=='ar')
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/authentication.css')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/assets/css/style-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/toastr.css')}}">

    @else
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/themes/semi-dark-layout.css')}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/toastr.css')}}">
    @endif
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="{{asset('cms/app-assets/images/pages/login.png')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{__('cms.Login')}}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{__('cms.Welcome_back,pleaselogintoyouraccount')}}</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="index.html">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="email" class="form-control" id="email" placeholder=" {{__('cms.Email')}}" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="email"> {{__('cms.Email')}}</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="password" placeholder=" {{__('cms.Password')}}" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="password"> {{__('cms.Password')}}</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" id="remember">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> {{__('cms.Rememberme')}}</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right"><a href="{{route('password.request',$guard)}}" class="card-link"> {{__('cms.Forgot_Password')}}?</a></div>
                                                    </div>
                                                    <a href="{{route('choose')}}" class="btn btn-outline-primary float-left btn-inline"> {{__('cms.Register')}}</a>
                                                    <button type="button" onclick="login()" class="btn btn-primary float-right btn-inline"> {{__('cms.Login')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text"> {{__('cms.OR')}}</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('cms/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('cms/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('cms/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/scripts/extensions/toastr.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function login() {
            let data = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                remember: document.getElementById('remember').checked,
            };
            axios.post('/cms/login', data).then(function(response) {
                   console.log(response);
                   toastr.success(response.data.message);
                   window.location.href = '/cms/dashboard/';
                })
                .catch(function(error) {
                    console.log(error);
                    toastr.error(error.response.data.message)
                });
        }
    </script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>