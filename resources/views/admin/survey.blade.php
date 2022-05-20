@extends('layouts.admin')

@section('title', 'Survey List')



@section('content')

    <!-- survey blade-->
    <div class="container-fluid w-100 p-3">

        <div class="row w-100 p-3 ms-4 bg-light rounded align-items-center justify-content-center mx-0">

            <div class="col-md-8 text-left">
                <h3 class="card-title">Surveys</h3>

                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-md-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <a href="{{route('admin_survey_create')}}" type="button" class="btn btn-primary m-2">Add Surveys</a>
                                <table  class="table table-striped table-hover table-secondary">
                                    <thead  class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Image Gallery</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datalist as $rs)
                                            <td> {{$rs->id}}</td>
                                            <td>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title )}}</td>
                                            <td>{{$rs->title}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td>
                                                @if($rs->image)
                                                    <img src="{{ Storage::url($rs->image) }}" height="100" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin_image_create',['survey_id'=>$rs->id])}}"> <button type="button" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"></path>
                                                        </svg>
                                                    </button> </a>
                                            </td>

                                            <td>
                                                <a href="{{route('admin_survey_edit', ['id'=>$rs->id])}}">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_survey_delete', ['id'=> $rs->id])}}" onclick="return confirm('Delete !! are you sure?')" >Delete</a>
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

