<!DOCTYPE html>
<html class="loading" @if (app()->getLocale()=='en') lang="en" data-textdirection="ltr"
@else lang="ar" data-textdirection="rtl"
@endif>
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Reset Password - Porfession</title>
    <link rel="apple-touch-icon" href="{{asset('cms/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cms/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    @if (app()->getLocale()=='ar')
    <!-- BEGIN: Vendor CSS-->
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
    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/toastr.css')}}">

    @else
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/authentication.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/assets/css/style.css')}}">

    @endif
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
                    <div class="col-xl-7 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0 w-100">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center p-0">
                                    <img src="{{asset('cms/app-assets/images/pages/reset-password.png')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{__('cms.RestPassword')}}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{__('cms.Please_enteryournewpassword')}}.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form>
                                                    <input class="form-control h-auto form-control-solid py-4 px-8" hidden type="text" autocomplete="off" value="{{$token}}" id="token" />
                                                   
                                                    <fieldset class="form-label-group">
                                                        <input type="password" class="form-control" id="password" placeholder="{{__('cms.Password')}}" required>
                                                        <label for="password">{{__('cms.Password')}}</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group">
                                                        <input type="password" class="form-control"  id="password_confirmation" placeholder="{{__('cms.ConfirmPassword')}}" required>
                                                        <label for="password_confirmation">{{__('cms.ConfirmPassword')}}</label>
                                                    </fieldset>
                                                    <div class="row pt-2">
                                                        
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <button type="button" onclick="resetPassword()" class="btn btn-primary btn-block px-0">{{__('cms.Reset')}}</button>
                                                        </div>
                                                    </div>
                                                </form>
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


    <script src="{{asset('cms/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('cms/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/scripts/extensions/toastr.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    function resetPassword(guard) {
        axios.post('/reset-password', {
            'token': '{{$token}}',
            'email': '{{$email}}',
            'password': document.getElementById('password').value,
            'password_confirmation': document.getElementById('password_confirmation').value,
        }).then(function(response) {
            toastr.success(response.data.message)
        }).catch(function(error) {
            toastr.error(error.response.data.message)
        });
    }
    </script>
</body>
<!-- END: Body-->

</html>