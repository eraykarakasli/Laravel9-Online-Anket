@extends('layouts.admin')

@section('title', 'Edit Survey')




@section('content')

@section('javascript')
    <!-- include summernote css/js -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 ms-4 bg-light rounded align-items-center justify-content-center mx-0">            <div class="col-md-6 text-center">
                <h3>Edit Survey</h3>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <form role="form" action="{{route('admin_survey_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">

                                        <label >Parent</label>

                                        <select class="form-control select2" name="category_id">
                                            @foreach ($datalist as $rs)
                                                <option value="{{ $rs->id}}" @if ($rs->id == $data->category_id) selected="selected" @endif > {{ $rs->title}} </option>
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
                                        <textarea id="summernote" type="text" name="detail">{{$data->detail}}</textarea>
                                        <script>
                                            $(document).ready(function() {
                                                $('#summernote').summernote();
                                            });
                                        </script>

                                    </div>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image" value="{{$data->image}}"  class="form-control" >

                                    @if($data->image)
                                        <img src="{{Storage::url($data->image)}}" height="100" alt="">
                                    @endif
                                    </div>
                                    <div class="mb-3">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="{{$data->slug}}"  class="form-control" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select class="form-select" name="status">
                                            <option selected="selected">{{$data->status}}</option>
                                            <option >True</option>
                                            <option >False</option>
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Survey</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->
@endsection
<!-- JavaScript Libraries -->
<script src="{{asset('assets')}}/admin/code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('assets')}}/admin/cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/chart/chart.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/easing/easing.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/waypoints/waypoints.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Template Javascript -->
<script src="{{asset('assets')}}/admin/js/main.js"></script>
