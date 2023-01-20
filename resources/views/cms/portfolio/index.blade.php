@extends('cms.parent')
@section('title','Portfolio')
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
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Portfolio')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('portfolios.index')}}">{{__('cms.Portfolio')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('cms.List')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="fonticon-wrap">
            <a href="{{route('portfolios.create')}}" class="btn btn-primary btn-sm-flat">
                <i class="feather icon-plus-square"></i>{{__('cms.Create-Protofolio')}}</a>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-examples">
            <div class="row match-height">
                @foreach ($portfolios as $portfolio)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card" style="height: 421.078px;">
                        <div class="card-content">
                            <div class="card-body">
                                <img class="card-img img-fluid mb-1" style="height:50%; width:100%;" src="{{Storage::url($portfolio->main_image)}}" alt="Card image cap">
                               <a href="{{route('portfolios.show',$portfolio->id)}}"><h5 class="mt-1">{{$portfolio->title}}</h5></a> 
                                <p class="card-text">{{$portfolio->description}}</p>
                                <hr class="my-1">
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="float-left">
                                        <a href="{{route('portfolios.edit', $portfolio->id)}}" class="btn gradient-light-info text-white waves-effect waves-light"> <i class="feather icon-edit" style="font-size: 18px;"></i>
                                            {{__('cms.edit')}}</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="#" onclick="confirmDelete('{{$portfolio->id}}', this)" class="btn btn-outline-danger waves-effect waves-light"> <i class="feather icon-trash" style="font-size: 18px;"></i>{{__('cms.delete')}}</a>
                                    </div>
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
<script>
    function confirmDelete(id, reference) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                performDelete(id, reference);
            }
        });
    }

    function performDelete(id, reference) {
        axios.delete('/cms/portfolios/' + id)
            .then(function(response) {
                console.log(response);
                // toastr.success(response.data.message);
                reference.closest('tr').remove();
                showMessage(response.data);
            })
            .catch(function(error) {
                console.log(error.response);
                // toastr.error(error.response.data.message);
                showMessage(error.response.data);
            });
    }

    function showMessage(data) {
        Swal.fire(
            data.title,
            data.text,
            data.icon
        );
    }
</script>

<!-- END: Page Vendor JS-->
@endsection