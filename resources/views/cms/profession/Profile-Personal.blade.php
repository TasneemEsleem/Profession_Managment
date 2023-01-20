@extends('cms.parent')
@section('title','Create')
@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/forms/select/select2.min.css')}}">

@endsection
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.ProfilePersonal')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item">{{__('cms.ProfilePersonal')}}
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
                            <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                <i class="feather icon-info mr-50 font-medium-3"></i>
                                {{__('cms.info')}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                <i class="feather icon-lock mr-50 font-medium-3"></i> {{__('cms.Change-Password')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-skill" data-toggle="pill" href="#account-vertical-skill" aria-expanded="false">
                                <i class="feather icon-lock mr-50 font-medium-3"></i> {{__('cms.Create-Skill')}}
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
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="mobile">{{__('cms.mobile')}}</label>
                                                        <input type="text" class="form-control" id="mobile" maxlength="10" onKeyPress="if(this.value.length==10) return false;" placeholder="{{__('cms.mobile')}}" value="{{auth()->user()->mobile}}" required data-validation-required-message="This username field is required">
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

                                    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                        <form novalidate enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="overview">{{__('cms.Bio')}}</label>
                                                        <textarea class="form-control" id="overview" rows="3" value="" placeholder="{{__('cms.Your Bio data here')}}...">{{$profile->overview ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="birth_date">{{__('cms.Birth date')}}</label>
                                                        <input type="date" class="form-control birthdate-picker" required placeholder="Birth date" data-provide="datepicker" value="{{$profile->birth_date ?? ''}}" id="birth_date" data-validation-required-message="This birthdate field is required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="gender">{{__('cms.gender')}}</label>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="M"  required>
                                                        <label class="form-check-label" for="gender">{{__('cms.Male')}}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="F">
                                                        <label class="form-check-label" for="gender">{{__('cms.FMale')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="category_id">{{__('cms.Category')}}</label>
                                                    <select class="form-control" id="category_id">
                                                        <option>{{__('cms.Choose_Category')}}</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}">
                                                            @if (app()->getLocale()=='ar')
                                                            {{$category->name_ar ?? ''}}
                                                            @else
                                                            {{$category->name_en ?? ''}}
                                                            @endif
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="subcategory_id">{{__('cms.SubCategory')}}</label>
                                                    <select class="form-control" id="subcategory_id" disabled>
                                                        <option value="-1" selected>{{__('cms.choose')}}</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="experience_certificate">{{__('cms.experience_certificate')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="experience_certificate">
                                                        <label class="custom-file-label" for="inputGroupFile01">{{Storage::url($profile->experience_certificate ?? '')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Prof_pract_certif">{{__('cms.Prof_pract_certif')}}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="Prof_pract_certif">
                                                        <label class="custom-file-label" for="inputGroupFile01">{{__('cms.Choose file')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="button" onclick="infoProfile()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{__('cms.Save_changes')}}</button>
                                                <button type="reset" class="btn btn-outline-warning">{{__('cms.Cancel')}}</button>
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

                                    <div class="tab-pane fade " id="account-vertical-skill" role="tabpanel" aria-labelledby="account-pill-skill" aria-expanded="false">
                                        <form novalidate id="create-forms">
                                            @csrf
                                            <div class="row">   
                                                <div class="col-sm-12 col-12" data-select2-id="152">
                                                 <div class="form-group" data-select2-id="151">
                                                 <label for="skill_id">{{__('cms.Skill')}}</label>
                                                    <select class="select2 form-control" id="skill_id" multiple="multiple" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                    <option>{{__('cms.Skill')}}</option>
                                                        @foreach($skills as $skill)
                                                        <option value="{{$skill->id}}">
                                                            @if (app()->getLocale()=='ar')
                                                            {{$skill->name_ar}}
                                                            @else
                                                            {{$skill->name_en}}
                                                            @endif
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    
                                                </div>
                                            </div>
                                                
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="button" onclick="skillStore()" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
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
<script src="{{asset('cms/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('cms/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('cms/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
<script>
    $(function() {
        bsCustomFileInput.init()
    });
</script>
<script type="text/javascript">
    $('#category_id').on('change', function() {
        if (this.value == -1) {
            $('#subcategory_id').empty();
            $("#subcategory_id").append('<option value=-1>Choose_SubCategory</option>');
            $('#subcategory_id').attr('disabled', true);
        } else {
            getsubcategory(this.value);

        }
    });

    function getsubcategory(category_id) {

        var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

        axios.get('/cms/category/' + category_id)
            .then(function(response) {
                console.log(response);
                console.log(response.data.subsategories);
                $('#subcategory_id').empty();
                if (response.data.subcategories.length > 0) {
                    $.each(response.data.subcategories, function(i, item) {
                        console.log('Id: ' + item['id']);
                        if (locale == 'ar') {
                            $('#subcategory_id').append(new Option(item['name_ar'], item['id']));
                        } else {
                            $('#subcategory_id').append(new Option(item['name_en'], item['id']));
                        }
                        $('#subcategory_id').attr('disabled', false);
                    });
                } else {
                    $('#subcategory_id').empty();
                    $('#subcategory_id').attr('disabled', true);
                }
            })
            .catch(function(error) {});
    }
</script>

<script>
    function profileUpdate() {
        var formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('mobile', document.getElementById('mobile').value);
        if (document.getElementById('auth_image').files[0] != undefined) {
            formData.append('image', document.getElementById('auth_image').files[0]);
        }
        formData.append('_method', 'PUT');
        axios.post('/cms/updateProfile/', formData)
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

    function infoProfile() {
        var formData = new FormData();
        formData.append('overview', document.getElementById('overview').value);
        formData.append('gender', document.getElementById('gender').value);
        formData.append('birth_date', document.getElementById('birth_date').value);
        formData.append('category_id', document.getElementById('category_id').value);
        formData.append('subcategory_id', document.getElementById('subcategory_id').value);

        if (document.getElementById('experience_certificate').files[0] != undefined) {
            formData.append('experience_certificate', document.getElementById('experience_certificate').files[0]);
        }
        if (document.getElementById('Prof_pract_certif').files[0] != undefined) {
            formData.append('Prof_pract_certif', document.getElementById('Prof_pract_certif').files[0]);
        }
        formData.append('_method', 'PUT');
        axios.post('/cms/infoProfile/', formData)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                window.location.href = '/cms/Profile-Personal';
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
        axios.put('/cms/updatePassword', data).then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById('edit_form').reset();
            })
            .catch(function(error) {
                console.log(error);
                toastr.error(error.response.data.message);
            });
    }
    function skillStore() {
axios.post('/cms/ProfessionSkill/store',{
    skill_id:Array.from(document.querySelectorAll('#skill_id option:checked')).map(el => el.value)
})
.then(function (response) {
    console.log(response);
    toastr.success(response.data.message);
    document.getElementById('create-forms').reset();
})
.catch(function (error) {
    console.log(error.response);
    toastr.error(error.response.data.message);
});}
</script>
@endsection