@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'Contact -'. $setting->title)
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
                <li class="breadcrumb-item"><a href="{{route('contact')}}">Contact</a></li>

            </ul>
        </div>
    </div>
    <div class="header col-12">

        <div class="row">

        <span class="col-sm-3">
        @include('home.usermenu')
        </span>

            <span class="col-xl-5">
            <h3> İletişim Bilgileri</h3>
            {!! $setting->contact  !!}

            </span>
            <span class="col-xl-4">
                 <h3> İletişim Formu</h3>
            iletişim formu
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
