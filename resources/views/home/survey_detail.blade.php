@php
    $setting= \App\Http\Controllers\HomeController::getsetting();
    $countreview= \App\Http\Controllers\HomeController::countreview($data->id);
    $avgrev= \App\Http\Controllers\HomeController::avrgreview($data->id);
@endphp
@extends('layouts.home')

@section('title', 'Survey Detail -'. $setting->title)
@section('description')
    {{$setting->description}}
@endsection

@section('keyword',$setting->keyword)


@section('content')
    @include('home._category')
    @include('home._slider')

    <div class="breadcrumb-wrap col-md-2">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{$data->title}}">{{$data->title}}</a></li>

            </ul>
        </div>
    </div>


        <div class="row">

        <span class="col-sm-3">
        @include('home.usermenu')
        </span>
            <span class="col-xl-9">


  <h4 class="fw-bold text-center mt-3"></h4>

  <form class=" bg-white px-4" action="">

    <p class="fw-bold"><h3>{{$data->title}}</h3></p>
      <p class="fw-bold">{!! $data->detail !!}</p>
    <div class="form-check mb-2">
         @foreach($datalist as $rs)
      <input class="form-check-input" type="radio" name="exampleForm" id="radioExample1" />

        <img src="{{Storage::url($rs->image)}}" style="height: 200px; width: 200px;" alt="">

      <label class="form-check-label" for="radioExample1">
       {{$rs->title}}
      </label>
             <br>
        @endforeach
    </div>

  </form>
                <br>

  <div class="text-end">
    <button type="button" class="btn btn-primary">Submit</button>
  </div>
            </span>
            <br>
            <br>

        </div>
    </div>

<div class="container">





    @livewire('review',['id' => $data->id])
    <div  id="rateMe2"  class="empty-stars">
        <h5>Average Rating :</h5>
        <i class="fa fa-star" @if($avgrev<1) -o empty @endif></i>
        <i class="fa fa-star" @if($avgrev<2) -o empty @endif></i>
        <i class="fa fa-star" @if($avgrev<3) -o empty @endif></i>
        <i class="fa fa-star" @if($avgrev<4) -o empty @endif></i>
        <i class="fa fa-star" @if($avgrev<5) -o empty @endif></i>
        <i>{{$avgrev}}</i>
    </div>
    <br>
    <br>
        <a class="nav-link active" data-toggle="pill" href="#reviews">Reviews {{$countreview}}</a>

                                <div id="reviews" class="container tab-pane fade active show">
                                    <div class="reviews-submitted" >
                                        @foreach($reviews as $rs)
                                            <div class="reviewer">{{$rs->user->name}} - <span>{{$rs->created_at}}</span></div>
                                            <div class="rating">
                                            <i class="fa fa-star" @if($rs->rate<1) -o empty @endif></i>
                                            <i class="fa fa-star"  @if($rs->rate<2) -o empty @endif ></i>
                                            <i class="fa fa-star"  @if($rs->rate<3) aria-hidden="true" @endif></i>
                                            <i class="fa fa-star"  @if($rs->rate<4) -o empty @endif ></i>
                                            <i class="fa fa-star"  @if($rs->rate<5) -o empty @endif></i>
                                            <i>{{$rs->rate}}</i>
                                        </div>
                                            <div class="review-body">
                                                <strong>{{$rs->subject}}</strong>
                                                <p>{{$rs->review}}</p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

    </div>


@endsection
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="js/addons/rating.js"></script>
