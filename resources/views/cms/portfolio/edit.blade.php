@extends('cms.parent')
@section('title','Edit')
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
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Edit-Protofolio')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('portfolios.index')}}">{{__('cms.Portfolio')}}</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('cms.Edit-Protofolio')}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="title">{{__('cms.title')}}</label>
                                                    <input type="text" id="title" class="form-control" placeholder="{{__('cms.Entertitle')}}"
                                                    value="{{$portfolio->title}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <label for="main_image">{{__('cms.main_image')}}</label>
                                                <div class="form-group">
                                                    <input class="btn btn-sm btn-info ml-20 mb-20" type="file" id="main_image">
                                                    <p class="text-muted ml-75 mt-50"><small>
                                                            {{__('cms.Allowed_JPG,GIForPNG.Max_size_of_800kB')}}</small></p>
                                                </div>
                                                <img class="card-img img-fluid mb-1" style="height:150px; width: 150px; " src="{{Storage::url($portfolio->main_image)}}" alt="Card image cap">
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{__('cms.description')}}</label>
                                                    <textarea class="form-control" id="description" rows="3" value="" placeholder="{{__('cms.Your description data here')}}...">
                                                    {{$portfolio->description}}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="completion_date">{{__('cms.completion_date')}}</label>
                                                    <input type="date" class="form-control birthdate-picker" required placeholder="completion_date" data-provide="datepicker" id="completion_date"
                                                     data-validation-required-message="This completion_date field is required"
                                                     value="{{$portfolio->completion_date}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <label for="image">{{__('cms.image_work')}}</label>
                                                <div class="form-group">
                                                    <input class="btn btn-sm btn-info ml-20 mb-20" type="file" id="image" multiple> <small>
                                                        {{__('cms.Max_image_is_5')}}</small>
                                                    <p class="text-muted ml-75 mt-50"><small>
                                                            {{__('cms.Allowed_JPG,GIForPNG.Max_size_of_800kB')}}</small></p>

                                                </div>
                                                <!-- <img class="card-img img-fluid mb-1" style="height:150px; width: 150px; " src="{{Storage::url($portfolio->images)}}" alt="Card image cap"> -->
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="custom-control custom-switch mr-2 mb-1">
                                                    <p class="mb-0">{{__('cms.Status')}}</p>
                                                    <input type="checkbox" class="custom-control-input" id="status"@if ($portfolio->status) checked
                                                    @endif>
                                                    <label class="custom-control-label" for="status">
                                                        <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                                        <span class="switch-icon-right"><i class="feather icon-bell"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="performUpdate('{{$portfolio->id}}')" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{__('cms.Save')}}</button>
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
    $(function() {
        bsCustomFileInput.init()
    });
</script>
<script>
    function performUpdate(id) {

        var formData = new FormData();
        formData.append('title', document.getElementById('title').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('completion_date', document.getElementById('completion_date').value);
        formData.append('status', document.getElementById('status').checked ? 1 : 0);
        formData.append('image_1', document.getElementById('image').files[0]);
        formData.append('image_2', document.getElementById('image').files[1]);
        formData.append('image_3', document.getElementById('image').files[2]);
        formData.append('image_4', document.getElementById('image').files[3]);
        formData.append('image_5', document.getElementById('image').files[4]);
        if (document.getElementById('main_image').files[0] != undefined) {
            formData.append('main_image', document.getElementById('main_image').files[0]);
        }
        formData.append('_method', 'PUT');
        axios.post('/cms/portfolios/{{$portfolio->id}}', formData)
        .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                //    document.getElementById('create-form').reset();
                window.location.href = '/cms/portfolios';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>
@endsection