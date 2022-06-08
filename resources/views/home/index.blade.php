@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
@endphp
@php
    $avgrev=\App\Http\Controllers\HomeController::avrgreview($data->id);
    $countreview=\App\Http\Controllers\HomeController::countreview($data->id);
@endphp
@extends('layouts.home')

@section('title', $setting->title)
@section('description')
    {{$setting->description}}
@endsection

@section('keyword',$setting->keyword)


@section('content')
    @include('home._category')
    @include('home._menu')
    @include('home._slider')


    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Surveys</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4" style="height: 500px;">
                @foreach($slider as $rs)
                <div class="col-lg-3" >

                    <div class="product-item">

                        <div class="product-title" style="height: 100px;">
                            <a href="#">{{$rs->title}}</a>
                            <div class="ratting">
                                <i class="fa fa-star" @if($rs->rate<1) -o empty @endif></i>
                                <i class="fa fa-star"  @if($rs->rate<2) -o empty @endif ></i>
                                <i class="fa fa-star"  @if($rs->rate<3) -o empty @endif></i>
                                <i class="fa fa-star"  @if($rs->rate<4) -o empty @endif ></i>
                                <i class="fa fa-star"  @if($rs->rate<5) -o empty @endif></i>
                            </div>
                        </div>
                        <div class="product-image " >
                            <a href="#">
                               <img src="{{Storage::url($rs->image)}}" style="height: 300px; width: 500px;" alt="Product Image">
                            </a>

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
    <!-- Featured Product End -->




@endsection

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
