@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'Survey Detail -'. $data->title)
@section('description')
    {{$data->description}}
@endsection

@section('keyword',$data->keyword)


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
    <div class="header col-12">

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
