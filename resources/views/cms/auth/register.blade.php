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
    <title>Register Page - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href=".{{asset('cms/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cms/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <style>
        #map {
            height: 100%;
        }
    </style>
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
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="{{asset('cms/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{__('cms.Create-Account')}}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{__('cms.Fillthebelowformtocreateanewaccount')}}.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form id="create-form">
                                                    <div class="form-label-group">
                                                        <input type="text" id="name" class="form-control" placeholder="{{__('cms.Name')}}" required>
                                                        <label for="name">{{__('cms.Name')}}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="email" class="form-control" placeholder="{{__('cms.Email')}}" required>
                                                        <label for="email">{{__('cms.Email')}}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="text" id="mobile" maxlength="10" onKeyPress="if(this.value.length==10) return false;" class="form-control" placeholder="{{__('cms.mobile')}}" required>
                                                        <label for="mobile">{{__('cms.mobile')}}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="password" class="form-control" placeholder="{{__('cms.Password')}}" required>
                                                        <label for="password">{{__('cms.Password')}}</label>
                                                    </div>
                                                    <!-- <div id="map" style="height: 50vh;"></div> -->
                                                    <div class="form-label-group">
                                                        <iframe src="https://maps.google.com/maps?q=LATITUDE_AND_LONGITUDE&hl=es;z=14&amp;output=embed" style="border: 0; width: 100%; height: 100%" id="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        <label for="map">{{__('cms.location')}}</label>
                                                    </div>

                                                    <a href="{{route('cms.login','profession')}}" class="btn btn-outline-primary float-left btn-inline mb-50">{{__('cms.Login')}}</a>
                                                    <button type="button" onclick="performStore()" class="btn btn-primary float-right btn-inline mb-50">{{__('cms.Register')}}</a>
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
        //         if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(showPosition);
        //     } else { 
        //         alert("Geolocation is not supported by this browser.");
        //     }
        //     function showPosition(position) {
        //     var lat = position.coords.latitude;
        //     var lng = position.coords.longitude;
        //     var iframe = document.getElementById("map");
        //     iframe.src = `https://maps.google.com/maps?q=${lat},${lng}&hl=es;z=14&amp;output=embed`;
        // }
        // function initMap() {
        //     const location = {
        //         lat: -25.363,
        //         lng: 131.044
        //     };
        //     const map = new google.maps.Map(document.getElementById("map"), {
        //         zoom: 15,
        //         center: location,
        //     });

        //     new google.maps.Marker({
        //         position: location,
        //         map,
        //         title: "Hello World!",
        //     });
        // }

        // window.initMap = initMap;
        function performStore() {
            navigator.geolocation.getCurrentPosition(function(position) {
                let latitude = position.coords.latitude;
                let longitude = position.coords.longitude;
                let name = document.getElementById("name").value;
                let email = document.getElementById("email").value;
                let mapUrl = `https://maps.google.com/maps?q=${latitude},${longitude}&hl=es;z=14&amp;output=embed`;
                document.getElementById("map").src = mapUrl;
                axios.post('/cms/register', {
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        'mobile': document.getElementById('mobile').value,
                        'password': document.getElementById('password').value,
                        latitude: latitude,
                        longitude: longitude
                    }).then(function(response) {
                        console.log(response);
                        toastr.success(response.data.message);
                        document.getElementById('create-form').reset();
                        window.location.href = '/cms/profession/login';
                    })
                    .catch(function(error) {
                        console.log(error.response);
                        toastr.error(error.response.data.message);
                    });
            });
        }
        // function performStore() {
        //     var formData = new FormData();
        //     formData.append('name', document.getElementById('name').value);
        //     formData.append('email', document.getElementById('email').value);
        //     formData.append('mobile', document.getElementById('mobile').value);
        //     formData.append('password', document.getElementById('password').value);
        //     axios.post('/cms/register', formData)
        //         .then(function(response) {
        //             console.log(response);
        //             toastr.success(response.data.message);
        //             document.getElementById('create-form').reset();
        //             window.location.href = '/cms/profession/login';
        //         })
        //         .catch(function(error) {
        //             console.log(error.response);
        //             toastr.error(error.response.data.message);
        //         });
        // }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjnVyVZqL0FwQ_7gIH4x0RatyC0PzwV6Q&callback=initMap&v=weekly" defer></script>

</body>
<!-- END: Body-->

</html>