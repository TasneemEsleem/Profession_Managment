@extends('cms.parent')
@section('title','Create')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/data-list-view.css')}}">

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">

            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{__('cms.Category')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{__('cms.Categories')}}</a>
                        </li>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="data-thumb-view" class="data-thumb-view-header">

            <!-- dataTable starts -->
            <div class="table-responsive">

                <table class="table data-thumb-view dataTable no-footer" id="DataTables_Table_0" role="grid">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">#</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="NAME: activate to sort column ascending">{{__('cms.name_ar')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CATEGORY: activate to sort column ascending">{{__('cms.name_en')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ORDER STATUS: activate to sort column ascending">{{__('cms.STATUS')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ACTION: activate to sort column ascending" style="width: 88.1719px;">{{__('cms.ACTION')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr role="row" class="odd">
                            <td>{{$loop->index +1}}</td>
                            <td class="product-name">{{$category->name_ar}}</td>
                            <td class="product-category">{{$category->name_en}}</td>
                            <td>
                                <div>
                                    <div class="badge @if ($category->status) bg-success @else  bg-danger
                                    @endif">{{$category->status}}</div>
                                </div>
                            </td>
                            <td style="width: 166.9062px;">
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm-flat">
                                    <i class="feather icon-edit" style="font-size: 18px;"></i></a>
                                <a href="#" onclick="confirmDelete('{{$category->id}}', this)" class="btn btn-danger btn-sm-flat">
                                    <i class="feather icon-trash" style="font-size: 18px;"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <!-- dataTable ends -->
</div>
</section>
<!-- Data list view end -->

</div>
</div>
@endsection
@section('scripts')
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('cms/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
<script src="{{asset('cms/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('cms/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('cms/app-assets/js/scripts/ui/data-list-view.js')}}"></script>

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
        axios.delete('/cms/categories/' + id)
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