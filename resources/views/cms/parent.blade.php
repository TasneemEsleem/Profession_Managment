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
    <title>Dashboard | @yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('cms/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cms/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/forms/select/select2.min.css')}}">

    @if (app()->getLocale()=='ar')
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/assets/css/style-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/toastr.css')}}">
    @else
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
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/extensions/toastr.css')}}">

    @endif

    @yield('styles')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating content-left-sidebar chat-application footer-static menu-expanded pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                            <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                            <!--     i.ficon.feather.icon-menu-->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{route('dashboard')}}" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
                                <!-- select.bookmark-select-->
                                <!--   option Chat-->
                                <!--   option email-->
                                <!--   option todo-->
                                <!--   option Calendar-->
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item">
                            @if (app()->isLocale('en'))
                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">{{__('cms.english')}}</span></a>
                            @else
                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-sa"></i><span class="selected-language">{{__('cms.arabic')}}</span></a>

                            @endif
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" data-language="en"><i class="flag-icon flag-icon-us"></i> {{__('cms.english')}}</a>
                                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" data-language="ar"><i class="flag-icon flag-icon-sa"></i>{{__('cms.arabic')}}</a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>

                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth()->user()->name}}</span><span class="user-status">{{auth()->user()->roles[0]->name ?? ''}}</span></div><span>
                                    @if (auth()->user()->image == null)
                                    <img class="round" src="{{asset('cms/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40">
                                    @if (auth('profession')->check() && auth()->user()->notarized == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 14 14" role="img">
                                        <path d="M13.72 7.03c.45-.56.34-1.39-.24-1.82l-.55-.41c-.34-.25-.53-.66-.51-1.08l.03-.68c.03-.72-.53-1.32-1.25-1.33h-.68c-.42 0-.81-.22-1.05-.57L9.11.57c-.39-.6-1.2-.75-1.79-.33l-.55.4c-.34.24-.79.3-1.18.15L4.95.55c-.67-.25-1.41.11-1.64.79l-.21.65c-.14.4-.46.71-.87.82l-.65.18C.89 3.19.5 3.92.71 4.6l.21.65c.13.41.04.85-.22 1.18l-.42.54c-.45.56-.34 1.39.24 1.81l.55.41c.34.25.53.66.51 1.08l-.03.68c-.03.72.54 1.32 1.25 1.33h.68c.42 0 .81.22 1.05.57l.37.57c.39.6 1.21.75 1.79.33l.55-.4c.34-.25.78-.31 1.18-.16l.64.24c.67.25 1.41-.1 1.64-.79l.21-.65c.13-.4.45-.71.86-.82l.65-.17c.69-.19 1.09-.92.87-1.61l-.21-.65c-.13-.4-.05-.85.22-1.18l.42-.53zM6.06 9.84L3.5 7.27l1.23-1.23 1.33 1.33 3.21-3.21L10.5 5.4 6.06 9.84z"></path>
                                    </svg>
                                    @endif
                                    @else
                                    <img class="round" src="{{Storage::url(auth()->user()->image)}}" alt="avatar" height="40" width="40">
                                    @if (auth('profession')->check() && auth()->user()->notarized == 1)
                                    
                                    <div style="--size: 20px; display: inline-block; width: var(--size); height: var(--size);margin-right: -5px;">
                                        <svg  xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 14 14" role="img">
                                            <path style="color:#1f57c3;" d="M13.72 7.03c.45-.56.34-1.39-.24-1.82l-.55-.41c-.34-.25-.53-.66-.51-1.08l.03-.68c.03-.72-.53-1.32-1.25-1.33h-.68c-.42 0-.81-.22-1.05-.57L9.11.57c-.39-.6-1.2-.75-1.79-.33l-.55.4c-.34.24-.79.3-1.18.15L4.95.55c-.67-.25-1.41.11-1.64.79l-.21.65c-.14.4-.46.71-.87.82l-.65.18C.89 3.19.5 3.92.71 4.6l.21.65c.13.41.04.85-.22 1.18l-.42.54c-.45.56-.34 1.39.24 1.81l.55.41c.34.25.53.66.51 1.08l-.03.68c-.03.72.54 1.32 1.25 1.33h.68c.42 0 .81.22 1.05.57l.37.57c.39.6 1.21.75 1.79.33l.55-.4c.34-.25.78-.31 1.18-.16l.64.24c.67.25 1.41-.1 1.64-.79l.21-.65c.13-.4.45-.71.86-.82l.65-.17c.69-.19 1.09-.92.87-1.61l-.21-.65c-.13-.4-.05-.85.22-1.18l.42-.53zM6.06 9.84L3.5 7.27l1.23-1.23 1.33 1.33 3.21-3.21L10.5 5.4 6.06 9.84z"></path>
                                        </svg>
                                    </div>
                                    @endif
                                    @endif


                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> {{__('cms.Edit_Profile')}}</a><a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> {{__('cms.Change_Password')}}</a><a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('cms.logout')}}"><i class="feather icon-power"></i> {{__('cms.Logout')}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0" style="font-size: 1.04rem;">{{__('cms.FreeLancing')}}</h2>
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('cms.Dashboard')}}</span></a>
                    @canany(['Read-Admins','Create-Admin','Read-User','Create-User','All-Profession'])
                <li class=" navigation-header"><span>{{__('cms.Humman_Resourses')}}</span></li>
                @canany(['Read-Admins','Create-Admin'])
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">{{__('cms.Admins')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-Admins')
                        <li><a href="{{route('admins.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-Admin')
                        <li><a href="{{route('admins.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['Read-User','Create-User'])
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">{{__('cms.User')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-Users')
                        <li><a href="{{route('users.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-User')
                        <li><a href="{{route('users.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['All-Profession'])
                @can('All-Profession')
                <li class=" nav-item"><a href="{{route('allProfession')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profession">{{__('cms.profession')}}</span></a>
                    @endcan
                    @endcanany
                    @endcanany
                    <div class="shadow-bottom"></div>
                    @canany(['Read-Roles','Create-Role','Read-Permission'])
                <li class=" navigation-header"><span>{{__('cms.Role_Permission')}}</span></li>

                <li class=" nav-item"><a href="#"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="User">{{__('cms.Role')}}</span></a>
                    @canany(['Read-Roles','Create-Role'])
                    <ul class="menu-content">
                        @can('Read-Roles')
                        <li><a href="{{route('roles.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-Role')
                        <li><a href="{{route('roles.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                    @endcanany
                </li>
                @canany(['Read-Permission'])
                <li class=" nav-item"><a href="#"><i class="feather icon-lock mr-50 "></i><span class="menu-title" data-i18n="User">{{__('cms.Permissions')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-Permission')
                        <li><a href="{{route('permissions.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @endcanany
                <div class="shadow-bottom"></div>
                @canany(['Plans'])
                @can('Plans')
                <li class=" nav-item"><a href="{{route('plan.choose')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profession">{{__('cms.plan')}}</span></a>
                    @endcan
                    @endcanany
                    <div class="shadow-bottom"></div>
                @canany(['Read-Categories','Create-Category','Read-SubCategory','Create-SubCategory','Read-Skills','Create-Skill'])
                <li class=" navigation-header"><span>{{__('cms.Category_SubCategory_Skill')}}</span></li>
                @canany(['Read-Categories','Create-Category'])
                <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="User">{{__('cms.Category')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-Categories')
                        <li><a href="{{route('categories.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-Category')
                        <li><a href="{{route('categories.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['Read-SubCategory','Create-SubCategory'])
                <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="User">{{__('cms.SubCategory')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-SubCategory')
                        <li><a href="{{route('subcategories.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-SubCategory')
                        <li><a href="{{route('subcategories.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['Read-Skills','Create-Skill'])
                <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="User">{{__('cms.Skill')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-Skills')
                        <li><a href="{{route('skills.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-Skill')
                        <li><a href="{{route('skills.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @endcanany

                <div class="shadow-bottom"></div>
                @canany(['Read-Projects','Create-Project'])
                <li class=" navigation-header"><span>{{__('cms.Project')}}</span></li>
                @canany(['Read-Projects','Create-Project'])
                <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="User">{{__('cms.Project')}}</span></a>
                    <ul class="menu-content">
                        @can('Read-Projects')
                        <li><a href="{{route('projects.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('cms.List')}}</span></a>
                        </li>
                        @endcan
                        @can('Create-Project')
                        <li><a href="{{route('projects.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">{{__('cms.Create')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @endcanany
                @canany(['All-Projects','Read-Professions'])
                <li class=" navigation-header"><span>{{__('cms.Project&&Profession')}}</span></li>

                <div class="shadow-bottom"></div>
                @can('All-Projects')
                <li class="nav-item"><a href="{{route('Projects')}}"><i class="fa fa-archive"></i><span class="menu-title" data-i18n="All Projects">{{__('cms.All-Projects')}}</span></a>
                </li>
                @endcan
                <div class="shadow-bottom"></div>
                @can('Read-Professions')
                <li class="nav-item"><a href="{{route('professions.index')}}"><i class="fa fa-archive"></i><span class="menu-title" data-i18n="All Projects">{{__('cms.Read-Professions')}}</span></a>
                </li>
                @endcan
                @endcanany
                @canany(['Index-Portfolio'])
                <div class="shadow-bottom"></div>
                <li class=" navigation-header"><span>{{__('cms.Portfolio')}}</span></li>
                @can('Index-Portfolio')
                <li class="nav-item"><a href="{{route('portfolios.index')}}"><i class="fa fa-suitcase"></i><span class="menu-title" data-i18n="Profile Personal">{{__('cms.Portfolio')}}</span></a>
                </li>
                @endcan
                @endcanany
                <!-- <div class="shadow-bottom"></div>
                @can('Account-Setting')
                <li class="nav-item"><a href="{{route('Account-Settings')}}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">{{__('cms.AccountSettings')}}</span></a>
                </li>
                @endcan -->

                <div class="shadow-bottom"></div>
                <li class=" navigation-header"><span>{{__('cms.Setting')}}</span></li>
                @can('Account-Setting')
                <li class="nav-item"><a href="{{route('Account-Settings')}}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">{{__('cms.AccountSettings')}}</span></a>
                </li>
                @endcan
                <div class="shadow-bottom"></div>
                @can('Profile-Personal')
                <li class="nav-item"><a href="{{route('Profile-Personal')}}"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Profile Personal">{{__('cms.ProfilePersonal')}}</span></a>
                </li>
                @endcan
                <div class="shadow-bottom"></div>
                @can('Profile-Profession')
                <li class="nav-item"><a href="{{route('Profile')}}"><i class="fa fa-user-circle-o"></i><span class="menu-title" data-i18n="Profile Personal">{{__('cms.ProfileProfession')}}</span></a>
                </li>
                @endcan







            </ul>


        </div>

    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        </p>
    </footer>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('cms/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('cms/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('cms/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{asset('cms/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('cms/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script src="{{asset('cms/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('cms/app-assets/js/scripts/extensions/toastr.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END: Page JS-->
    @yield('scripts')
</body>
<!-- END: Body-->

</html>