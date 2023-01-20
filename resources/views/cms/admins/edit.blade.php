@extends('cms.parent')
@section('title','Create')
@section('styles')
@endsection
@section('content')
<!-- {{__('cms.Create')}} -->
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Edit-Admin')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{__('cms.Admins')}}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">

                <div class="col-md-12 col-12">
                    <div class="card" style="height: 501.406px;">
                        <div class="card-header">
                            <h4 class="card-title">{{__('cms.Edit-Admin')}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical">
                                @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="name">{{__('cms.Name')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="name" class="form-control" placeholder="{{__('cms.EnterUserName')}}" value="{{$admin->name}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="email">{{__('cms.Email')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="email" id="email" class="form-control" placeholder="{{__('cms.Email')}}" value="{{$admin->email}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-mail"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-icon">Role</label>
                                                    <div class="form-group data-select2-id=126">
                                                        <select class="form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" id="role_id">
                                                            @foreach ($roles as $role )
                                                            <option value="{{$role->id}}" @selected($currentRole->id == $role->id)>{{$role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="custom-control custom-switch mr-2 mb-1">
                                                    <p class="mb-0">{{('cms.Status')}}</p>
                                                    <input type="checkbox" class="custom-control-input" id="status" @if ($admin->status) checked
                                                    @endif>
                                                    <label class="custom-control-label" for="status">
                                                        <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                                        <span class="switch-icon-right"><i class="feather icon-bell"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="performUpdate('{{$admin->id}}')" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{__('cms.Save')}}</button>
                                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">{{__('cms.Reset')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('cms/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('cms/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script>
    function performUpdate(id) {
        let data = {
            email: document.getElementById('email').value,
            name: document.getElementById('name').value,
            role_id: document.getElementById('role_id').value,

            // remember: document.getElementById('remember').checked,
            status: document.getElementById('status').checked ? 1 : 0,
        };
        axios.put('/cms/admins/{{$admin->id}}', data)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                //  document.getElementById('create-form').reset();
                window.location.href = '/cms/admins';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>

@endsection