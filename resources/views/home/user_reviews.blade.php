@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'My Reviews -'. $setting->title)
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
                <li class="breadcrumb-item"><a href="{{route('myreviews')}}">My Reviews</a></li>

            </ul>
        </div>
    </div>
    <div class="header col-12">

        <div class="row">

        <span class="col-sm-3">
        @include('home.usermenu')
        </span>
            <span class="col-xl-9">

           <div class="my-account">
                <div class="col-md-10">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                            <h4></h4>
                        </div>
                        <div class="tab-pane fade " id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">

                        </div>
                        <div class="tab-pane fade " id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">

                        </div>
                        <div class="tab-pane fade show active" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h4>Reviews</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Survey</th>
                                        <th>Subject</th>
                                        <th>Reviews</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Delete</th></tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr class="table-info">
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->data->title}}</td>
                                            <td>{{$rs->subject}}</td>
                                            <td>{{$rs->review}}</td>
                                            <td>{{$rs->rate}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td>{{$rs->created_at}}</td>
                                            <td><a href="{{route('user_review_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete!! Are you OK?')"> <img src="https://cilingirogluburo.com/pFiles/img/grupKodlari/cop-kovalari_24_08_2020%2013_52_59.png" width="50"></a> </td>
                                        </tr>
                                    @endforeach
                                    @include('home.message')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="account-tab" role="tabpanel">
                            <h4>Account Details</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
