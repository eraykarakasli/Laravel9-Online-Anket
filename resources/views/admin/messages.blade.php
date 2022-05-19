@extends('layouts.admin')

@section('title', ' Contact Message List')



@section('content')

    <!-- survey blade-->
    <div class="container-fluid w-100 p-3">

        <div class="row w-100 p-3 ms-4 bg-light rounded align-items-center justify-content-center mx-0">

            <div class="col-md-10 text-center">
                <h3 class="card-title">Messages</h3>

                <!-- Table Start -->
                <div class="container-fluid text-lg-center pt-4 px-4" style="height: 1100px;">
                    <div class="row g-4">
                        <div class="col-md-12 ">
                            <div class="bg-light rounded h-100 p-4">

                                <table  class="table table-striped text-lg-center table-hover table-secondary">
                                    @include('home.message')
                                    <thead  class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Admin Note</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datalist as $rs)
                                        <tr class="table-info">
                                            <td> {{$rs->id}}</td>
                                            <td>{{$rs->name}}</td>
                                            <td>{{$rs->email}}</td>
                                            <td>{{$rs->phone}}</td>
                                            <td>{{$rs->subject}}</td>
                                            <td>{{$rs->message}}</td>
                                            <td>{{$rs->note}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td>
                                                <a href="{{route('admin_message_edit',['id'=>$rs->id])}}" target="_blank">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_message_delete', ['id'=> $rs->id])}}" onclick="return confirm('Delete !! are you sure?')" >Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                <!-- Table End -->


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
