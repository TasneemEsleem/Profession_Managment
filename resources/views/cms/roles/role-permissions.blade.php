@extends('cms.parent')
@section('title','Permission')
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
                <h2 class="content-header-title float-left mb-0">{{__('cms.Permissions')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{__('cms.Role')}}</a>
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
            <div>
                <h3>{{__('cms.Role')}} (<span class="badge bg-success">{{$role->name}}</span>){{__('cms.Permissions')}}</h3>
            </div>
            <!-- dataTable starts -->
            <div class="table-responsive">

                <table class="table data-thumb-view dataTable no-footer" id="DataTables_Table_0" role="grid">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">#</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="NAME: activate to sort column ascending">{{__('cms.NAME')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ORDER STATUS: activate to sort column ascending">{{__('cms.User_Type')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="NAME: activate to sort column ascending">{{__('cms.Permissions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr role="row" class="odd">
                            <td>{{$loop->index +1}}</td>
                            <td>{{$permission->name}}</td>
                            <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                            <td>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input onclick="performUpdate('{{$permission->id}}')" type="checkbox" id="permission{{$permission->id}}_check_box" @checked($permission->granted)>
                                        <label for="permission{{$permission->id}}_check_box">
                                        </label>
                                    </div>
                                </div>
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
<!-- <script src="{{asset('cms/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script> -->
<script src="{{asset('cms/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('cms/app-assets/js/scripts/ui/data-list-view.js')}}"></script>

<script>
    function performUpdate(permissionId) {
        axios.put('/cms/roles/{{$role->id}}/permission', {
                permission_id: permissionId,
                role_id: {{ $role->id}},
            })
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
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