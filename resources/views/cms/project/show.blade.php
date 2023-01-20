@extends('cms.parent')
@section('title','Show')
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
                    <h2 class="content-header-title float-left mb-0">{{__('cms.All-Projects')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{__('cms.Dashboard')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('Projects')}}">{{__('cms.All-Projects')}}</a>
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
                                            <a href="{{route('Projects')}}" class="nav-link font-small-3">{{__('cms.All-Projects')}}</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="{{route('professions.index')}}" class="nav-link font-small-3">{{__('cms.Read-Professions')}}</a>
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
                                <h4>{{__('cms.userinformation')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.NAME')}}:</h6>
                                    <p>{{$project->user->name}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.create_at')}}:</h6>
                                    <p>{{$project->user->created_at->format('d/m/Y')}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.Email')}}:</h6>
                                    <p>{{$project->user->email}}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-1">
                                    <h3 class="mb-0 text-center">{{$project->title}}</h3>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.description')}}:{{$project->description}}</h5>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.duration date')}}:{{$project->duration_date}}</h5>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.create_at')}}:{{$project->created_at}}</h5>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.Category')}}:
                                        @if (app()->getLocale()=='ar')
                                        {{$project->category->name_ar}}
                                        @else
                                        {{$project->category->name_en}}
                                    </h5>
                                    @endif
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.SubCategory')}}:
                                        @if (app()->getLocale()=='ar')
                                        {{$project->SubCategory->name_ar}}
                                        @else
                                        {{$project->SubCategory->name_en}}
                                    </h5>
                                    @endif
                                </div>
                                <hr>
                                <!-- View All Insert Proposel -->
                                @foreach ($proposels as $proposel)
                                <div class="d-flex justify-content-start align-items-center mb-1">
                                    <div class="avatar mr-50">
                                    <a href="javascript: void(0);">
                                                @if ($proposel->profession->first()->image == null)
                                                <img src="{{asset('cms/app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" height="30" width="30">
                                                @else
                                                <img src="{{Storage::url($proposel->profession->first()->image)}}" alt="Avatar" height="30" width="30">
                                                @endif
                                            </a>
                                    </div>
                                    <div class="user-page-info">
                                        <h6 class="mb-0">{{$proposel->profession->first()->name}}</h6>
                                        <span class="font-small-2">{{$proposel->content}}</span>
                                    </div>
                                    <div class="ml-auto cursor-pointer">
                                    <a href="{{route('chat.index')}}" class="nav-link font-small-3">
                                      <i class="feather icon-message-square"></i>  </a>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Insert Proposel -->
                         
                                  <form id="create_form">
                                <fieldset class="form-label-group mb-50">
                                    <textarea class="form-control" id="content" rows="3" placeholder="{{__('cms.Add Comment')}}"></textarea>
                                    <label for="content">{{__('cms.Add Comment')}}</label>
                                </fieldset>
                                <button type="button" onclick="performStore()" class="btn btn-sm btn-primary waves-effect waves-light">{{__('cms.Post Comment')}}</button>
                                </form>   
                               
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
<script>
    function performStore() {
        let data = {
            content: document.getElementById('content').value,
            'project_id': '{{$project->id}}',
        };
        axios.post('/cms/proposels', data)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById('create_form').reset();
                // window.location.href = '/cms/proposels';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>

@endsection