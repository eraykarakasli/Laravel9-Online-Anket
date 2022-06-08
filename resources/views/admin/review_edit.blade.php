@extends('layouts.admin')

@section('title', 'Admin Panel Home Page')



@section('content')

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row min-vh-100 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="col-md-8 text-center">


                <form role="form" action="{{route('admin_review_update',['id'=>$data->id])}}" method="post" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>id</th><td>{{$data->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th><td>{{$data->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Place</th><td>{{$data->surveys->title}}</td>
                        </tr>
                        <tr>
                            <th>Subject</th><td>{{$data->subject}}</td>
                        </tr>
                        <tr>
                            <th>Review</th><td>{{$data->review}}</td>
                        </tr>
                        <tr>
                            <th>Rate</th> <td>{{$data->rate}}</td>
                        </tr>
                        <tr>
                            <th>IP</th>   <td>{{$data->IP}}
                            </td>
                        </tr>
                        <tr>
                            <th>Created Date</th>   <td>{{$data->created_at}}
                            </td>
                        </tr>
                        <tr>
                            <th>Updated Date</th>   <td>{{$data->updated_at}}
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th><td>
                                <select name="status">
                                    <option selected>{{$data->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Edit</th><td>
                                <button type="submit" class="btn btn-primary mr-2">Edit review </button>
                            </td>
                        </tr>
                        @include('home.message')

                        </thead>
                    </table>

                </form>

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
