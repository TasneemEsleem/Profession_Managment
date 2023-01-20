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
        </section>
    </div>
</div>
@endsection
@section('scripts')
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
                reference.closest('tr').remove();
                showMessage(response.data);
            })
            .catch(function(error) {
                console.log(error.response);
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
@endsection