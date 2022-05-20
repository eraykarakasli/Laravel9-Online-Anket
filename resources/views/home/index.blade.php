@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
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
                            <a href="#">
                               <img src="{{Storage::url($rs->image)}}" style="height: 300px; width: 500px;" alt="Product Image">
                            </a>

                        </div>
                        <div class="product-price" style="height: 80px;">

                            <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Make a Survey</a>
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
