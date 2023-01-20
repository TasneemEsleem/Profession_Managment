@extends('cms.parent')
@section('title','Create')
@section('styles')
@if (app()->getLocale()=='ar')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/users.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/knowledge-base.css')}}">

@else
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/users.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/knowledge-base.css')}}">

@endif
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.ProfilePersonal')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{__('cms.ProfileProfession')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('cms.ProfileProfession')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="profile-header mb-2">
                        <div class="relative">
                            <div class="cover-container">
                                <img class="img-fluid bg-cover rounded-0 w-100" src="{{asset('cms/app-assets/images/backgrounds/freelancing.jpg')}}" alt="User Profile Image">
                            </div>
                            <div class="profile-img-container d-flex align-items-center justify-content-between">
                                <div class="float-right">
                                    <a href="{{route('Profile-Personal')}}" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                                        <i class="feather icon-edit-2"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center profile-header-nav">
                            <nav class="navbar navbar-expand-sm w-100 pr-0">
                                <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                        <li class="nav-item px-sm-0">
                                            <a href="{{route('Profile')}}" class="nav-link font-small-3">{{__('cms.ProfilePersonal')}}</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="{{route('Portfolio')}}" class="nav-link font-small-3">{{__('cms.Portfolio')}}</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">{{__('cms.Rating')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-examples">
                <div class="row match-height">
                    <div class="card-body">
                        @foreach ($portfolios as $portfolio)
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card" style="height: 421.078px;">
                                <div class="card-content">
                                    <div class="card-body">
                                        <img class="card-img img-fluid mb-1" style="height:50%; width:100%;" src="{{Storage::url($portfolio->main_image)}}" alt="Card image cap">
                                        <a href="{{route('portfolios.show',$portfolio->id)}}">
                                            <h5 class="mt-1">{{$portfolio->title}}</h5>
                                        </a>
                                        <p class="card-text">{{$portfolio->description}}</p>
                                        <hr class="my-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="'{{asset('cms/app-assets/js/scripts/pages/user-profile.js')}}'"></script>

@endsection