@extends('cms.parent')
@section('title','Profession')
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
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Read-Professions')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('professions.index')}}">{{__('cms.Read-Professions')}}</a>
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
                @foreach ($professions as $profession)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mt-1">
                                    <a href="{{route('professions.show',$profession->id)}}">
                                        <div class="profile-img-container d-flex align-items-center justify-content-between">
                                            @if ($profession->image == null)
                                            <img src="{{asset('cms/app-assets/images/profile/user-uploads/user-10.jpg')}}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                            @else
                                            <img src="{{Storage::url($profession->image)}}" class="rounded-circle img-border box-shadow-1" alt="Card image" style="width: 200px; height: 200px;">
                                            @endif

                                        </div>
                                    </a>
                                </div>
                                <div class="mt-1">
                                    <a  class="nav-link" href="{{route('professions.show',$profession->id)}}">
                                        <h6 class="mb-0 text-center text-success fw-bold">{{$profession->name}}</h6>
                                    </a>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.create_at')}}:{{$profession->created_at->format('d/m/Y')}}</h5>
                                    <p></p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.mobile')}}:{{$profession->mobile}}</h6>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.Email')}}:{{$profession->email}}</h6>
                                </div>
                                <div class="mt-1">
                                <a href="#" class="btn btn-warning btn-sm-flat" title="{{__('cms.Message')}}">
                                <i class="feather icon-message-square" 
                                style="font-size: 18px;"></i>
                                    </a>
                               
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