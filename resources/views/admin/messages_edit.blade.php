
    <!-- include summernote css/js -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4 bg-light">
        <div class="row w-100 p-4 ms-4 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 text-center">
                <h3>Message Detail</h3>
                @include('home.message')
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <form role="form" action="{{route('admin_message_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <table  class="table table-striped text-lg-center table-hover table-secondary">

                                            <tr>
                                                <th scope="col">Id</th><td> {{$data->id}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Name</th> <td>{{$data->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Email</th> <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Phone</th> <td>{{$data->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Subject</th><td>{{$data->subject}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Message</th><td class="">{{$data->message}}</td>
                                            </tr>
                                           <tr>
                                               <th scope="col">Admin Note</th>
                                           <td>  <textarea id="note" type="text" name="note">{{$data->note}}</textarea>
                                               </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Message</button>
                                </form>
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
