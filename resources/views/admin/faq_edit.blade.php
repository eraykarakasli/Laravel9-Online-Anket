@extends('layouts.admin')

@section('title', 'Edit Faq')




@section('content')

@section('javascript')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
@endsection

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4 bg-light">
        <div class="row w-100 p-4 ms-4 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 text-center">
                <h3>Edit Faq</h3>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <form role="form" action="{{route('admin_faq_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">                                    @csrf

                                    <div class="mb-3">
                                        <label>Position</label>
                                        <input type="number" name="position" value="{{$data->position}}" class="form-control" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Question</label>
                                        <input type="text" name="question" value="{{$data->question}}" class="form-control" >
                                    </div>

                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select class="custom-select" name="status">
                                            <option selected="selected">{{$data->status}}</option>
                                            <option >True</option>
                                            <option >False</option>

                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label>Answer</label>
                                        <textarea id="answer" type="text" name="answer">{{$data->answer}}</textarea>
                                        <script>
                                            CKEDITOR.replace( 'answer' );
                                        </script>

                                    </div>


                                    <button type="submit" class="btn btn-primary">Update Faq</button>
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
