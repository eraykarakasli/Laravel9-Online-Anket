@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'Surveys -'. $data->title." Surveys List")
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

        <span class="col-sm-4">
        @include('home.usermenu')
        </span>
            <div class="row col-8">
                @foreach($datalist as $rs)
                     <div class="col-md-4" >
                                <div class="product-item"  >
                                    <div class="product-title">
                                        <a href="#">{{$rs->title}}</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image" >
                                        <a href="{{route('survey',['id'=>$rs->id,'slug'=>$rs->slug])}}" >
                                            <img src="{{Storage::url($rs->image)}}" alt="Product Image" style="height: 400px;">
                                        </a>
                                        <div class="product-action">

                                            <a href="#"><i class="fa fa-heart"></i></a>

                                        </div>
                                    </div>
                                    <div class="product-price" style="height: 80px;">

                                        <a class="btn" href="{{route('survey',['id'=>$rs->id,'slug'=>$rs->slug])}}"></i>Make a Survey</a>
                                    </div>
                                </div>
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
