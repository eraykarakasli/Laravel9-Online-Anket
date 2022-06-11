

    <!-- survey blade-->
    <div class="container-fluid w-100 p-3">

        <div class="row w-100 p-3 ms-4 bg-light rounded align-items-center justify-content-center mx-0">

            <div class="col-md-8 text-left">
                <h3 class="card-title">User Show</h3>

                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-md-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th rowspan="8" >
                                            @if($data->profile_photo_path)
                                                <img src="{{Storage::url($data->profile_photo_path)}}" height="300px">
                                        @endif
                                        </td>
                                        </th>

                                    </tr>
                                    <tr>
                                        <th>Name</th><td>{{$data->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th><td>{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th><td>{{$data->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Adress</th><td>{{$data->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th><td>{{$data->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Roles</th>
                                        <td>
                                            <table>
                                                @foreach($data->roles as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>
                                                            <a href="{{route('admin_user_role_delete',['userid'=>$data->id,'roleid'=>$row->id])}}" onclick="return confirm('delete! are you sure')">Delete Role</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Add Role</th>
                                        <td>
                                            <form role="form" action="{{route('admin_user_role_add',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <select class="form-control" name="roleid">
                                                    @foreach($datalist as $rs)
                                                        <option value="{{$rs->id}}">{{$rs->name}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-primary">Add Role</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @include('home.message')

                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

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

