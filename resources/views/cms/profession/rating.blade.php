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
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body">
                              
                            
                            @if(is_null($rating))
                                <div class="alert alert-warning">
                                    <strong>{{__('cms.norating')}}</strong>
                                </div>
                              @else
                                <div class="mt-1">
                                <p class="font-weight-bold ">Review</p>
                                             <div class="form-group row">
                                                <input type="text" name="booking_id" value="{{ $rating->user_id }}">
                                                <div class="col">
                                                   <div class="rated">
                                                    @for($i=1; $i<=$value->rating; $i++)
                                                      {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                                                      <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                    @endfor
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-2">
                                                <div class="col">
                                                    <p>{{ $value->comments }}</p>
                                                </div>
                                             </div>
                                       </div>
                                    </div>
                                 </div> 
                                



                                </div>
                                @endif
                                <div class="mt-1">
                                    <h3 class="mb-0">{{__('cms.Bio')}}:</h3>
                                    <p></p>
                                </div>
                               
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