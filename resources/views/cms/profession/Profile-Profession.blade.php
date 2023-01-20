@extends('cms.parent')
@section('title','Create')
@section('styles')
@if (app()->getLocale()=='ar')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/users.css')}}">
@else
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/users.css')}}">
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
                                @if (is_null(auth()->user()->image))
                                <img src="{{asset('cms/app-assets/images/profile/user-uploads/user-10.jpg')}}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                @else
                                <img src="{{Storage::url(auth()->user()->image)}}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                @endif
                                <div class="float-right">
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                                        <i class="feather icon-edit-2"></i>
                                    </button>

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
                                        <a href="{{route('rating.index')}}" class="nav-link font-small-3">{{__('cms.Rating')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section id="profile-info">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('cms.professionInformation')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.NAME')}}:</h6>
                                    <p>{{$profile->profession->name ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.create_at')}}:</h6>
                                    <p>{{$profile->profession->created_at  ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Lives:</h6>
                                    <p>New York, USA</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.Email')}}:</h6>
                                    <p>{{$profile->profession->email  ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.mobile')}}:</h6>
                                    <p>{{$profile->profession->mobile  ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-1">
                                    <h3 class="mb-0">{{__('cms.Bio')}}:</h3>
                                    <p>{{$profile->overview  ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.Birth date')}}:</h5>
                                    <p>{{$profile->birth_date  ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.Category')}}:</h5>
                                    @if (app()->getLocale()=='ar')
                                    <p>{{$profile->category->name_ar  ?? ''}}</p>
                                    @else
                                    <p>{{$profile->category->name_en  ?? ''}}</p>

                                    @endif
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.SubCategory')}}:</h5>
                                    @if (app()->getLocale()=='ar')
                                    <p>{{$profile->SubCategory->name_ar  ?? ''}}</p>
                                    @else
                                    <p>{{$profile->SubCategory->name_en  ?? ''}}</p>
                                    @endif
                                </div>
                                @if(is_null($profession_skills))
                                <div class="alert alert-warning">
                                    <strong>{{__('cms.noskill')}}</strong>
                                </div>
                                @else
                                <div class="mt-1">
                                    <h4 class="mb-0">{{__('cms.Skills')}}:</h4>
                                    @foreach ($profession_skills as $profession_skill )
                                    @if (app()->getLocale()=='ar')
                                    <div class="btn btn-success">
                                        <strong>{{$profession_skill->skills->name_ar  ?? ''}}</strong>
                                    </div>
                                    @else
                                    <div class="btn btn-success">
                                        <strong>{{$profession_skill->skills->name_en  ?? ''}}</strong>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                                @endif
                            </div>



                        </div>



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