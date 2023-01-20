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
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Edit-Project')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__('cms.Project')}}</a>
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
                            <h4 class="card-title">{{__('cms.Edit-Project')}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="title">{{__('cms.title')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="title" value="{{$project->title}}" class="form-control" placeholder="{{__('cms.Entertitle')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="duration_date">{{__('cms.duration date')}}</label>
                                                    <input type="text" id="duration_date" value="{{$project->duration_date}}" class="form-control" placeholder="{{__('cms.duration date')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="price">{{__('cms.price')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="price" value="{{$project->price}}" class="form-control" placeholder="{{__('cms.price')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="description">{{__('cms.description')}}</label>
                                                    <textarea class="form-control" id="description" rows="3" value="" placeholder="{{__('cms.Your description data here')}}...">{{$project->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="category_id">{{__('cms.Category')}}</label>
                                                    <select class="form-control" id="category_id">
                                                        <option>{{__('cms.Choose_Category')}}</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}"{{ $category->id == $project->category_id ? 'selected': ''}}>
                                                            @if (app()->getLocale()=='ar')
                                                            {{$category->name_ar}}
                                                            @else
                                                            {{$category->name_en}}
                                                            @endif
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="subcategory_id">{{__('cms.SubCategory')}}</label>
                                                    <select class="form-control" id="subcategory_id" disabled>
                                                        <option value="-1" selected>{{__('cms.choose')}}</option>
                                                        @foreach($subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}" {{ $subcategory->id == $project->subcategory_id ? 'selected': ''}}>
                                                            @if (app()->getLocale()=='ar')
                                                            {{$subcategory->name_ar}}
                                                            @else
                                                            {{$subcategory->name_en}}
                                                            @endif
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 col-12">
                                                <div class="custom-control custom-switch mr-2 mb-1">
                                                    <p class="mb-0">{{__('cms.Status')}}</p>
                                                    <input type="checkbox" class="custom-control-input" id="status"
                                                    @if ($project->status) checked
                                                    @endif>
                                                    <label class="custom-control-label" for="status">
                                                        <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                                        <span class="switch-icon-right"><i class="feather icon-bell"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="performUpdate('{{$project->id}}')" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{__('cms.Save')}}</button>
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
    function performUpdate() {
        let data = {
            title: document.getElementById('title').value,
            description: document.getElementById('description').value,
            duration_date: document.getElementById('duration_date').value,
            price: document.getElementById('price').value,
            category_id: document.getElementById('category_id').value,
            subcategory_id: document.getElementById('subcategory_id').value,
            status: document.getElementById('status').checked ? 1 : 0,
        };
        axios.put('/cms/projects/{{$project->id}}', data)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                //  document.getElementById('create-form').reset();
                window.location.href = '/cms/projects';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>

@endsection