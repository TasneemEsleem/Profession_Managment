@extends('cms.parent')
@section('title','Create')
@section('styles')
@if (app()->getLocale()=='ar')
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css-rtl/pages/users.css')}}">
@else
<link rel="stylesheet" type="text/css" href="{{asset('cms/app-assets/css/pages/users.css')}}">
@endif
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Read-Professions')}}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('cms.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('professions.index')}}">{{__('cms.show-profession')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('cms.show-profession')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="profile-header mb-2">
                        <div class="relative">
                            <div class="cover-container">
                                <img class="img-fluid bg-cover rounded-0 w-100" src="{{asset('cms/app-assets/images/backgrounds/freelancing.jpg')}}" alt="User Profile Image">
                            </div>
                            <div class="profile-img-container d-flex align-items-center justify-content-between">
                                @if ($profile->profession->image == null)
                                <img src="{{asset('cms/app-assets/images/profile/user-uploads/user-10.jpg')}}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                @else
                                <img src="{{Storage::url($profile->profession->image)}}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center profile-header-nav">
                            <nav class="navbar navbar-expand-sm w-100 pr-0">
                                <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                        <li class="nav-item px-sm-0">
                                            <a href="{{route('Profile')}}" class="nav-link font-small-3">{{__('cms.ProfilePersonal')}}</a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a class="nav-link d-flex py-75 active" id="portfolio-pill-general" data-toggle="pill" href="#portfolio-vertical-general" aria-expanded="true">
                                                <i class="feather icon-globe mr-50 font-medium-3"></i>
                                                {{__('cms.Portfolio')}}
                                            </a>
                                        </li>
                                        <li class="nav-item px-sm-0">
                                            <a href="#" class="nav-link font-small-3">{{__('cms.Rating')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section id="profile-info">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('cms.professionInformation')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.NAME')}}:</h6>
                                    <p>{{$profile->profession->name ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.create_at')}}:</h6>
                                    <p>{{$profile->profession->created_at->format('d/m/Y') ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Lives:</h6>
                                    <p>New York, USA</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.Email')}}:</h6>
                                    <p>{{$profile->profession->email ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">{{__('cms.mobile')}}:</h6>
                                    <p>{{$profile->profession->mobile ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-1">
                                    <h3 class="mb-0">{{__('cms.Bio')}}:</h3>
                                    <p>{{$profile->overview}}</p>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.Birth date')}}:</h5>
                                    <p>{{$profile->birth_date ?? ''}}</p>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.Category')}}:</h5>
                                    @if (app()->getLocale()=='ar')
                                    <p>{{$profile->category->name_ar ?? ''}}</p>
                                    @else
                                    <p>{{$profile->category->name_en ?? ''}}</p>

                                    @endif
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.SubCategory')}}:</h5>
                                    @if (app()->getLocale()=='ar')
                                    <p>{{$profile->SubCategory->name_ar ?? ''}}</p>
                                    @else
                                    <p>{{$profile->SubCategory->name_en ?? ''}}</p>
                                    @endif
                                </div>
                                @if(is_null($profession_skills))
                                <div class="alert alert-warning">
                                    <strong>{{__('cms.noskill')}}</strong>
                                </div>
                                @else
                                <div class="mt-1">
                                    <h4 class="mb-0">{{__('cms.Skills')}}:</h4>
                                    @foreach ($profession_skills as $profession_skill )
                                    @if (app()->getLocale()=='ar')
                                    <div class="btn btn-success">
                                        <strong>{{$profession_skill->skills->name_ar}}</strong>
                                    </div>
                                    @else
                                    <div class="btn btn-success">
                                        <strong>{{$profession_skill->skills->name_en}}</strong>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('cms.rating')}}</h4>
                            </div>
                            <div class="card-body">
                                <h4>{{__('cms.addrating')}}</h4>

                                <form id="create-form">
                                    @csrf
                                    <div class="mt-1">
                                        <div class="col">
                                            <div class="rate" style="width: 170px;">
                                                <input type="radio" id="star5" class="rate" name="star_rating" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" checked id="star4" class="rate" name="star_rating" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" class="rate" name="star_rating" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" class="rate" name="star_rating" value="2">
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" class="rate" name="star_rating" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <div class="form-group">
                                            <label for="comments">{{__('cms.comments')}}</label>
                                            <textarea class="form-control" id="comments" rows="6" value="" placeholder="{{__('cms.Your comments here')}}..."></textarea>
                                        </div>
                                    </div>

                                    <div class="mt-1">
                                        <button type="button" onclick="performStore()" class="btn btn-sm py-1 px-3 btn-info">{{__('cms.Save')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('cms.rating')}}</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($ratings as $rating )
                                          
                                <div class="mt-1">
                                    
                                    <div class="col">
                                    <p>{{ $rating->user->name }}</p>
                                        <div class="rate" style="width: 170px; color: orange;">
                                            @for($i=1; $i<=$rating->star_rating; $i++)
                                                <input type="radio"  id="star{{$i}}" class="rate" name="rating" value="5" />
                                                <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <div class="form-group row mt-4">
                                        <div class="col">
                                            <p>{{ $rating->comments }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                </div>
                        </div>
                    </div>
                            

                    @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('cms.Portfolio')}}: {{$loop->index +1}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mt-1">
                                    <a href="{{route('showPortfolio',$portfolio->id)}}">
                                        <h6 class="mb-0">{{__('cms.title')}}:{{$portfolio->title ?? ''}}</h6>
                                    </a>
                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.description')}}:{{$portfolio->description ?? ''}}</h5>

                                </div>
                                <div class="mt-1">
                                    <h5 class="mb-0">{{__('cms.created_at')}}:{{$portfolio->created_at->format('d/m/Y') ?? ''}}</h5>
                                    <p></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </section>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script src="'{{asset('cms/app-assets/js/scripts/pages/user-profile.js')}}'"></script>
<script>
    function performStore() {
        let data = {
            comments: document.getElementById('comments').value,
            star_rating: document.querySelector('input[name="star_rating"]:checked').value,
            profession_id: '{{$profile->profession->id}}',
        };
        axios.post('/cms/review-store', data)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                //  document.getElementById('create-form').reset();
                // window.location.href = '/cms/review-store';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>
@endsection