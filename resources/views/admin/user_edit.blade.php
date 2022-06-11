@extends('layouts.admin')

@section('title', 'User Edit')




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
    <div class="container-fluid pt-4 px-4 bg-light">
        <div class="row w-100 p-4 ms-4 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 text-center">
                <h3>Edit User</h3>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <form role="form" action="{{route('admin_user_update',['id'=>$data->id])}}" method="post" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="name" name="name" value="{{$data->name}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label >Email</label>
                                        <input type="email" name="email" value="{{$data->email}}"class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label >Phone</label>
                                        <input type="text" name="phone"value="{{$data->phone}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label >Adress</label>
                                        <input type="adress" name="adress"value="{{$data->adress}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label >Image</label>
                                        <input type="file" name="image"  class="form-control">
                                        @if($data->profile_photo_path)
                                            <img src="{{Storage::url($data->profile_photo_path)}}" height="75" alt="">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Update User</button>
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
