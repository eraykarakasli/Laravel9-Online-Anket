@extends('layouts.admin')

@section('title', 'Faq List')



@section('content')
@section('javascript')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
@endsection

    <!-- survey blade-->
    <div class="container-fluid w-100 p-3">

        <div class="row w-100 p-3 ms-4 bg-light rounded align-items-center justify-content-center mx-0">

            <div class="col-md-8 text-left">
                <h3 class="card-title">Frequently Asked Questions</h3>

                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-md-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <a href="{{route('admin_faq_create')}}" type="button" class="btn btn-primary m-2">Add Questions</a>
                                @include('home.message')
                                <table  class="table table-striped table-hover table-secondary">
                                    <thead  class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datalist as $rs)
                                            <td> {{$rs->id}}</td>
                                            <td> {{$rs->position}}</td>
                                            <td>{{$rs->question}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td>{{$rs->answer}}</td>

                                            <td>
                                                <a href="{{route('admin_faq_edit', ['id'=>$rs->id])}}">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_faq_delete', ['id'=> $rs->id])}}" onclick="return confirm('Delete !! are you sure?')" >Delete</a>
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

