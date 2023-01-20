@extends('cms.parent')
@section('title','Create')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/forms/validation/form-validation.css')}}">

@endsection
@section('content')
<!-- {{__('cms.Create')}} -->
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Create-Role')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{__('cms.Index-Roles')}}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="{{route('roles.create')}}">{{__('cms.Create-Role')}}</a>
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
                            <h4 class="card-title">{{__('cms.Create-Admin')}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="name">{{__('cms.Name')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="name" class="form-control" placeholder="{{__('cms.EnterNameRole')}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-icon">{{__('cms.Role')}}</label>
                                                    <div class="form-group data-select2-id=126">
                                                        <select class="form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" id="guard">
                                                            <option>{{__('cms.Choose_Role')}}</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="profession">Profession</option>
                                                            <option value="user">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="performStore()" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{__('cms.Save')}}</button>
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
  function performStore() {
    var formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    formData.append('guard', document.getElementById('guard').value);
    axios.post('/cms/roles', formData)
      .then(function(response) {
        console.log(response);
        toastr.success(response.data.message);
        //  document.getElementById('create-form').reset();
        window.location.href = '/cms/roles';
      })
      .catch(function(error) {
        console.log(error.response);
        toastr.error(error.response.data.message);
      });
  }
</script>

@endsection