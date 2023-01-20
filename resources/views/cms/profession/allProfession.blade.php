@extends('cms.parent')
@section('title','Create')
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
                <h2 class="content-header-title float-left mb-0">{{__('cms.professions')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('professions.index')}}">{{__('cms.professions')}}</a>
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
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image: activate to sort column descending" style="width: 172.938px;">{{__('cms.Image')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="NAME: activate to sort column ascending">{{__('cms.NAME')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CATEGORY: activate to sort column ascending">{{__('cms.Email')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="POPULARITY: activate to sort column ascending">{{__('cms.notarized')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ORDER STATUS: activate to sort column ascending">{{__('cms.STATUS')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ACTION: activate to sort column ascending" style="width: 88.1719px;">{{__('cms.Change-notarized')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professions as $profession)
                        <tr role="row" class="odd">
                            <td>{{$loop->index +1}}</td>
                            <td class="product-img sorting_1">
                                @if ($profession->image == null)
                                <img src="{{asset('cms/app-assets/images/portrait/small/avatar-s-11.jpg')}}" style="width: 70px; height: 70px;" alt="Img placeholder">
                                @else
                                <img src="{{Storage::url($profession->image ?? '')}}" style="width: 70px; height: 70px;" alt="Img placeholder">
                                @endif
                            </td>
                            <td class="product-name"> <a  class="nav-link" href="{{route('professions.show',$profession->id)}}">
                                        {{$profession->name}}
                                    </a>
                                </td>
                            <td class="product-category">{{$profession->email}}</td>
                            <td>
                                <div>
                                    <div class="badge @if ($profession->notarized) bg-success @else  bg-danger
                                    @endif">{{$profession->notarized}}</div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="badge @if ($profession->status) bg-success @else  bg-danger
                                    @endif">{{$profession->status}}</div>
                                </div>
                            </td>
                            <td style="width: 166.9062px;">
                                @if($profession->notarized==1)
                                <a onclick="changeStatus('{{$profession->id}}')" class="btn btn-icon btn btn-danger btn-active-color-primary btn-sm" title="تم توثيق الحساب">
                                <i class="feather icon-user-x"></i> </a>
                                @else
                                <a onclick="changeStatus('{{$profession->id}}')" class="btn btn-icon btn btn-success btn-active-color-primary btn-sm" title="الحساب غير موثق">
                                <i class="feather icon-user-check"></i>
                                    @endif
                                </a>
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
function changeStatus(id) {
    axios.post('/cms/profession/change-notarized/' + id)
        .then(function(response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/all-profession';
        })
        .catch(function(error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
}


</script>


<!-- END: Page Vendor JS-->
@endsection