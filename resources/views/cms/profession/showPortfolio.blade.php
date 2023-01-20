@extends('cms.parent')
@section('title','Show')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.show-portfolio')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('professions.index')}}">{{__('cms.Read-Professions')}}</a>
                            </li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="app-ecommerce-details">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5 mt-2">
                        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{Storage::url($portfolio->main_image)}}" class="img-fluid" alt="image">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5>{{__('cms.title')}}</h5>
                            <h5>{{$portfolio->title}}
                            </h5>
                            <p class="text-muted">{{__('cms.create_at')}} :
                                {{$portfolio->created_at->format('d/m/Y')}}
                            </p>
                            <hr>
                            <p>{{$portfolio->description}}</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('scripts')

@endsection