@php
    $setting= \App\Http\Controllers\HomeController::getsetting();
 $countattendance= \App\Http\Controllers\AttendanceController::countattendance($data->id);
@endphp
@extends('layouts.home')

@section('title', 'My Attendance -'. $setting->title)
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
                <li class="breadcrumb-item"><a href="{{route('user_surveys')}}">My Surveys</a></li>

            </ul>
        </div>
    </div>
    <div class="header col-12">

        <div class="row">

        <span class="col-sm-3">
        @include('home.usermenu')
        </span>
            <span class="col-xl-9">
 <div class="col-md-8 text-left">
                <h3 class="card-title">My Attendance </h3>

     <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-md-12 ">
                            <div class="bg-light rounded h-100 p-4">

                                <table  class="table table-striped table-hover table-secondary">
                                    <thead  class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Survey</th>

                                        <th scope="col">Answer</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Image</th>


                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datalist as $rs)
                                        <td> {{$rs->id}}</td>
                                        <td>{{$rs->survey->title}}</td>
                                        <td>{{$rs->answer}}</td>

                                        <td>{{$countattendance}}</td>
                                        <td>

                                            @if($rs->survey->image)
                                            <img src="{{ Storage::url($rs->survey->image) }}" height="100" >
                                            @endif
                                            </td>


                                        <td>
                                                <a href="{{route('user_attendance_delete', ['id'=> $rs->id])}}" onclick="return confirm('Delete !! are you sure?')" >Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
