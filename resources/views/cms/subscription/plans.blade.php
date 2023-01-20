@extends('cms.parent')
@section('title','Create')
@section('styles')
@endsection
@section('content')

<div class="content-wrapper">
<section>
<div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Create-Skill')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('skills.index')}}">{{__('cms.Skill')}}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="{{route('skills.create')}}">{{__('cms.Create-Skill')}}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">
        <section id="basic-horizontal-layouts">
    <div class="row text-center align-items-end">
        <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="bg-white p-5 rounded-lg shadow">
            <h1 class="h6 text-uppercase font-weight-bold mb-4">FREE</h1>
            <h2 class="h1 font-weight-bold">$0<span class="text-small font-weight-normal ml-2">/ free</span></h2>
 
            <div class="custom-separator my-4 mx-auto bg-primary"></div>
 
            <ul class="list-unstyled my-5 text-small text-left">
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> Lorem ipsum dolor sit amet</li>
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis</li>
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> At vero eos et accusamus</li>
                <li class="mb-3 text-muted">
                <i class="fa fa-times mr-2"></i>
                <del>Nam libero tempore</del>
                </li>
                <li class="mb-3 text-muted">
                <i class="fa fa-times mr-2"></i>
                <del>Sed ut perspiciatis</del>
                </li>
                <li class="mb-3 text-muted">
                <i class="fa fa-times mr-2"></i>
                <del>Sed ut perspiciatis</del>
                </li>
            </ul>
            <a href="#" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
            </div>
        </div>
 
        @foreach($plans as $plan)
        <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="bg-white p-5 rounded-lg shadow">
            <h1 class="h6 text-uppercase font-weight-bold mb-4">{{ $plan->name }}</h1>
            <h2 class="h1 font-weight-bold">${{ $plan->price }}<span class="text-small font-weight-normal ml-2">/ month</span></h2>
 
            <div class="custom-separator my-4 mx-auto bg-primary"></div>
 
            <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> Lorem ipsum dolor sit amet</li>
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis</li>
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> At vero eos et accusamus</li>
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> Nam libero tempore</li>
                <li class="mb-3">
                <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis</li>
                <li class="mb-3 text-muted">
                <i class="fa fa-times mr-2"></i>
                <del>Sed ut perspiciatis</del>
                </li>
            </ul>
            <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
            </div>
        </div>
        @endforeach
    </div>
  </div>
</section>
</div>
</div>
@endsection

@section('scripts')

@endsection