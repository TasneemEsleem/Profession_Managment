@extends('cms.parent')
@section('title','project')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/knowledge-base.css')}}">
<!-- END: Page CSS-->

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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('Projects')}}">{{__('cms.All-Projects')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('cms.List')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-examples">
            <div class="row match-height">
                @foreach ($projects as $project)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mt-1">
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <a href="{{route('projects.show',$project->id)}}"><button class="btn btn-outline-warning">{{$project->title}}</button></a>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.Publisher')}}:{{$project->user->name}}</h6>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.created_at')}}:{{$project->created_at->format('d/m/Y')}}</h5>
                                    <p></p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.price')}}:{{$project->price}}</h6>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.duration date')}}:{{$project->duration_date}}</h6>
                                </div>
                                <!-- <a href="{{route('projects.show',$project->id)}}"><h5 class="mt-1">{{$project->title}}</h5></a>  -->
                                <!-- <p class="card-text">{{$project->description}}</p> -->
                                <!-- <p class="card-text">{{$project->price}}</p> -->
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.Category')}}:
                                        @if (app()->getLocale()=='ar')
                                        {{$project->category->name_ar}}
                                        @else
                                        {{$project->category->name_en}}
                                        @endif
                                    </h5>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.SubCategory')}}: @if (app()->getLocale()=='ar')
                                        {{$project->SubCategory->name_ar}}
                                        @else
                                        {{$project->SubCategory->name_en}}
                                        @endif
                                    </h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Profile Cards Ends -->
            </div>
        </section>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('cms/app-assets/js/scripts/pages/faq-kb.js')}}"></script>

<!-- END: Page Vendor JS-->
@endsection