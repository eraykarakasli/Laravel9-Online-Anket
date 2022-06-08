@extends('layouts.admin')

@section('title', 'Admin Panel Home Page')



@section('content')

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row min-vh-100 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="col-md-8 text-center">

                    <h4>Reviews</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Survey</th>
                                <th>Subject</th>
                                <th>Review</th>
                                <th>Rate</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datalist as $rs)

                                <tr class="table-info">
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->user->name}}</td>
                                    <td><a {{$rs->survey->title}}</a></td>
                                    <td>{{$rs->subject}}</td>
                                    <td>{{$rs->review}}</td>
                                    <td>{{$rs->rate}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td>{{$rs->created_at}}</td>


                                    <td>
                                        <a href="{{route('admin_review_show',['id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">
                                            <img src="https://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/512/edit-icon.png"  width="50"></a>
                                    </td>

                                    <td><a href="{{route('admin_review_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete!! Are you OK?')"> <img src="https://cilingirogluburo.com/pFiles/img/grupKodlari/cop-kovalari_24_08_2020%2013_52_59.png" width="50"></a> </td>
                                </tr>
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
