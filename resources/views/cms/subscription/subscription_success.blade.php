@extends('cms.parent')
@section('title','Create')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success">
                   {{__('cms.Subscription purchase successfully')}}!
                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')

@endsection