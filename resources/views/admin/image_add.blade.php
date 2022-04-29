@extends('layouts.admin')

@section('title', 'Add Images Gallery')



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
    <div class="container-fluid pt-4 px-4 col-7">
        <div class="container-lg">

            <div class="col-md-6 text-center">
                <h2>Add Images</h2>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <h3>Anket : {{$data->title}}</h3>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <form role="form" action="{{ route('admin_image_store', ['survey_id'=>$data->id]) }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" >
                                    </div>

                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" >
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            <div class="container-xl">
            <table  class="table table-striped table-hover table-secondary " >
                <thead  class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col" >Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>

                @foreach ($images as $rs)
                    <tbody >
                    <td> {{$rs->id}}</td>
                    <td>{{$rs->title}}</td>
                    <td>
                        @if($rs->image)
                            <img src="{{ Storage::url($rs->image) }}" height="100" alt="">
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin_image_delete', ['id'=> $rs->id,'survey_id'=>$data->id])}}" onclick="return confirm('Delete !! are you sure?')" >Delete</a>
                    </td>
                 @endforeach
                </tbody>
            </table>
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
