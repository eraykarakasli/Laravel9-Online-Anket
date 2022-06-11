@php
    $setting= \App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', 'Survey Edit -'. $setting->title)
@section('description')
    {{$setting->description}}
@endsection

@section('keyword',$setting->keyword)
@section('javascript')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
@endsection


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
   <h3>Edit Survey</h3>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <form role="form" action="{{route('user_survey_update', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">

                                        <label >Category</label>

                                        <select class="form-control select2 " size="1" name="parent_id">
                                            @foreach ($datalist as $rs)
                                                <option value="{{ $rs->id}}" @if ($rs->id == $data->parent_id) selected="selected" @endif >
                                                    {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$data->title}}" class="form-control" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Keywords</label>
                                        <input type="text" name="keyword" value="{{$data->keyword}}"  class="form-control" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Description</label>
                                        <input type="text" name="description" value="{{$data->description}}"  class="form-control" >
                                    </div>

                                    <div class="mb-3">
                                        <label>Detail</label>
                                      <textarea name="detail"></textarea>
                <script>
                        CKEDITOR.replace( 'detail' );
                </script>


                                    </div>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image" value="{{$data->image}}"  class="form-control" >
                                        @if($data->image)
                                            <img src="{{Storage::url($data->image)}}" height="100" alt="">
                                        @endif

                                    <div class="mb-3">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="{{$data->slug}}"  class="form-control" >
                                    </div>
                                    <div class="mb-4" >
                                        <label>Status</label>
                                        <select class="form-select" size="1" name="status">
                                            <option selected="selected" >{{$data->status}}</option>
                                            <option >True</option>
                                            <option >False</option>
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Survey</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

            </div>
            </span>
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
@section('javascript')
    <!-- include summernote css/js -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

