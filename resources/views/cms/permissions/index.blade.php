@extends('cms.parent')
@section('title','Index')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/data-list-view.css')}}">

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">

            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{__('cms.Permissions')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{__('cms.Permissions')}}</a>
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
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="NAME: activate to sort column ascending">{{__('cms.NAME')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="POPULARITY: activate to sort column ascending">{{__('cms.Role')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permession)
                        <tr role="row" class="odd">
                            <td>{{$loop->index +1}}</td>
                           
                            <td class="product-name">{{$permession->name}}</td>
                            <td>
                            {{$permession->guard_name}}
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
<!-- END: Page Vendor JS-->
@endsection