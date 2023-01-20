@extends('cms.parent')
@section('title','Create')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    @if (auth('admin')->check())
    <section id="statistics-card">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{$admins}}</h2>
                            <p>{{__('cms.Admins')}}</p>
                        </div>
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-user text-primary font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{$user}}</h2>
                            <p>{{__('cms.User')}}</p>
                        </div>
                        <div class="avatar bg-rgba-success p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-server text-success font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{$profession}}</h2>
                            <p>{{__('cms.profession')}}</p>
                        </div>
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-activity text-danger font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{$skill}}</h2>
                            <p>{{__('cms.Skill')}}</p>
                        </div>
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-alert-octagon text-warning font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="table-borderless">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('cms.profession')}}</h4>
                    </div>
                    <div class="card-content">

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('cms.NAME')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(is_null($professions))
                                    <div class="alert alert-warning">
                                        Not have data
                                    </div>
                                    @else
                                    @foreach ($professions as $profession)
                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        <td>{{$profession->name}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('cms.User')}}</h4>
                    </div>
                    <div class="card-content">

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('cms.NAME')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(is_null($users))
                                    <div class="alert alert-warning">
                                        Not have data
                                    </div>
                                    @else
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('cms.Skills')}}</h4>
                    </div>
                    <div class="card-content">

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{__('cms.Name')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(is_null($skills))
                                    <div class="alert alert-warning">
                                        Not have data
                                    </div>
                                    @else
                                    @foreach ($skills as $skill)
                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        @if (app()->getLocale()=='ar')
                                        <td>{{$skill->name_ar}}</td>
                                        @else
                                        <td>{{$skill->name_en}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="table-borderless">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('cms.All-Projects')}}</h4>
                    </div>
                    <div class="card-content">

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('cms.name')}}</th>
                                        <th>{{__('cms.title')}}</th>
                                        <th>{{__('cms.price')}}</th>
                                        <th>{{__('cms.Categories')}}</th>
                                        <th>{{__('cms.Status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(is_null($projects))
                                    <div class="alert alert-warning">
                                        Not have data
                                    </div>
                                    @else
                                    @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        <td> <a href="{{route('projects.show',$project->id)}}">{{$project->user->name}}</a></td>
                                        <td>{{$project->title}}</td>
                                        <td>{{$project->price}}</td>
                                        @if (app()->getLocale()=='ar')
                                        <td>{{$project->category->name_ar}}</td>
                                        @else
                                        <td>{{$project->category->name_en}}</td>
                                        @endif
                                        <td>{{$project->status}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
@elseif (auth('profession')->check())
<section id="statistics-card">
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{$portfolio}}</h2>
                        <p>{{__('cms.Portfolio')}}</p>
                    </div>
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-suitcase text-primary font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{$proposel}}</h2>
                        <p>{{__('cms.proposels')}}</p>
                    </div>
                    <div class="avatar bg-rgba-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-server text-success font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{$skillprofession}}</h2>
                        <p>{{__('cms.Skills')}}</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-alert-octagon text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row" id="table-borderless">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('cms.All-Projects')}}</h4>
                    </div>
                    <div class="card-content">

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('cms.name')}}</th>
                                        <th>{{__('cms.title')}}</th>
                                        <th>{{__('cms.price')}}</th>
                                        <th>{{__('cms.Categories')}}</th>
                                        <th>{{__('cms.Status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        <td> <a href="{{route('projects.show',$project->id)}}">{{$project->user->name}}</a></td>
                                        <td>{{$project->title}}</td>
                                        <td>{{$project->price}}</td>
                                        @if (app()->getLocale()=='ar')
                                        <td>{{$project->category->name_ar}}</td>
                                        @else
                                        <td>{{$project->category->name_en}}</td>
                                        @endif
                                        <td> 
                                        <div class="badge @if ($project->status) bg-success @else  bg-danger
                                    @endif">{{$project->activeStatus}}</div></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section id="statistics-card">
    <div class="row">
        <div class="col-lg-2 col-sm-6 col-12">
        <div class="card-header" style="background-color: steelblue;">
            <h5 style="text-align: center;">{{__('cms.project')}} </h5>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{$project_user}}</h2>
                        <p>{{__('cms.Number-project')}}</p>

                    </div>
                  
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-sm-6 col-12">
            <div class="card-header" style="background-color: steelblue;">
            <h5 style="text-align: center;">{{__('cms.project_proposel')}}</h5>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                @foreach ($project_proposel as $project_propose)
                    <div>
                        <h2 class="text-bold-700 mb-0">{{$project_propose->proposels_count}}</h2>
                        <p>{{$project_propose->title}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        <div class="row" id="table-borderless">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('cms.Read-Professions')}}</h4>
                    </div>
                    <div class="card-content">

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('cms.Image')}}</th>
                                        <th>{{__('cms.NAME')}}</th>
                                        <th>{{__('cms.Email')}}</th>
                                        <th>{{__('cms.mobile')}}</th>
                                        <th>{{__('cms.notarized')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($professions as $profession)
                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        <td>
                                            @if ($profession->image == null)
                                            <img style="width: 87px; height: 85px;" src="{{asset('cms/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="Img placeholder">
                                            @else
                                            <img style="width: 87px; height: 85px;" src="{{Storage::url($profession->image ?? '')}}">
                                            @endif
                                        </td>
                                        <td> <a href="{{route('professions.show',$profession->id)}}">{{$profession->name}}</a></td>
                                        <td>{{$profession->email}}</td>
                                        <td>{{$profession->mobile}}</td>
                                        <td> 
                                        <div class="badge @if ($profession->notarized) bg-success @else  bg-danger
                                    @endif">{{$profession->notarizedStatus}}</div></td>
                                        <!-- <td>{{$profession->notarized}}</td> -->
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
</div>
@endsection
@section('scripts')

@endsection