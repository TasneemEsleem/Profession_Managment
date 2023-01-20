@extends('cms.parent')
@section('title','Create')
@section('styles')
@endsection
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.AccountSettings')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('cms.AccountSettings')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
               
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                <i class="feather icon-globe mr-50 font-medium-3"></i>
                                {{__('cms.Edit-Profile')}}
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                <i class="feather icon-lock mr-50 font-medium-3"></i> {{__('cms.Change-Password')}}
                            </a>
                        </li>
                    </ul>
                  
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                              
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                        <div class="media">
                                            <a href="javascript: void(0);">
                                                @if (auth()->user()->image == null)
                                                <img src="{{asset('cms/app-assets/images/portrait/small/avatar-s-12.jpg')}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                @else
                                                <img class="rounded mr-75" alt="profile image" height="64" width="64" src="{{Storage::url(auth()->user()->image)}}" alt="avatar" height="40" width="40">
                                                @endif
                                            </a>
                                            <form novalidate id="create-form">
                                                @csrf
                                                <div class="media-body mt-75">
                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="auth_image">{{__('cms.Upload_new_photo')}}</label>
                                                        <input type="file" id="auth_image" hidden>
                                                        <button class="btn btn-sm btn-outline-warning ml-50">{{__('cms.Reset')}}</button>
                                                    </div>
                                                    <p class="text-muted ml-75 mt-50"><small>
                                                            {{__('cms.Allowed_JPG,GIForPNG.Max_size_of_800kB')}}</small></p>
                                                </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="name">{{__('cms.Name')}}</label>
                                                        <input type="text" class="form-control" id="name" placeholder="{{__('cms.Name')}}" value="{{auth()->user()->name}}" required data-validation-required-message="This username field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="email">{{__('cms.Email')}}</label>
                                                        <input type="email" class="form-control" id="email" placeholder="{{__('cms.Email')}}" value="{{auth()->user()->email}}" required data-validation-required-message="This name field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="button" onclick="profileUpdate()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{__('cms.Save_changes')}}</button>
                                                <button type="reset" class="btn btn-outline-warning">{{__('cms.Cancel')}}</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                        <form novalidate id="edit_form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="current_password">{{__('cms.CurrentPassword')}}</label>
                                                            <input type="password" class="form-control" id="current_password" required placeholder="{{__('cms.CurrentPassword')}}" data-validation-required-message="This old password field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="new_password">{{__('cms.NewPassword')}}</label>
                                                            <input type="password" name="password" id="new_password" class="form-control" placeholder="{{__('cms.NewPassword')}}" required data-validation-required-message="The password field is required" minlength="6">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="new_password_confirmation">{{__('cms.NewPasswordConfirmation')}}</label>
                                                            <input type="password" class="form-control" required id="new_password_confirmation" data-validation-match-match="password" placeholder="{{__('cms.NewPasswordConfirmation')}}" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="button" onclick="performUpdate()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                        {{__('cms.Save_changes')}}</button>
                                                    <button type="reset" class="btn btn-outline-warning">{{__('cms.Cancel')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- account setting page end -->
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('cms/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    function profileUpdate() {
        var formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        if (document.getElementById('auth_image').files[0] != undefined) {
            formData.append('image', document.getElementById('auth_image').files[0]);
        }
        formData.append('_method', 'PUT');
        axios.post('/cms/update-profile/', formData)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                window.location.href = '/cms/dashboard';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }

    function performUpdate() {
        let data = {
            current_password: document.getElementById('current_password').value,
            new_password: document.getElementById('new_password').value,
            new_password_confirmation: document.getElementById('new_password_confirmation').value,
        };
        axios.put('/cms/update-password', data).then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById('edit_form').reset();
            })
            .catch(function(error) {
                console.log(error);
                toastr.error(error.response.data.message);
            });
    }
</script>
@endsection