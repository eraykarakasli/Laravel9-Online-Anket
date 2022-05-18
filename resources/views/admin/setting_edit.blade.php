@extends('layouts.admin')

@section('title', 'Edit Settings')




@section('content')

@section('javascript')
    <!-- include summernote css/js -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endsection


<!-- setting edit -->
<div class="container-fluid  p-3 bg-light" >
    <div class="row w-1500 p-3 ms-4 bg-light rounded align-items-center justify-content-center mx-0" >
        <div class="col-md-8 text-left" style="height: 1650px">

            <h2 class="card-title fw-bold">Edit Setting</h2>

            <ul class="nav nav-tabs " >
                <li><a href="#general" data-toggle="tab">General</a></li>
                <li><a href="#tab-smtp" data-toggle="tab">Smtp Email</a></li>
                <li><a href="#tab-social" data-toggle="tab">Social Media</a></li>
                <li><a href="#tab-aboutus" data-toggle="tab">About Us</a></li>
                <li><a href="#tab-contact" data-toggle="tab">Contact Page</a></li>
                <li><a href="#tab-references" data-toggle="tab">References</a></li>


            </ul>
            <form role="form" action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$data->title}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Keywords</label>
                        <input type="text" name="keyword" value="{{$data->keyword}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description" value="{{$data->description}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Company</label>
                        <input type="text" name="company" value="{{$data->company}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Adress</label>
                        <input type="text" name="adress" value="{{$data->adress}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$data->phone}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Fax</label>
                        <input type="text" name="fax" value="{{$data->fax}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" value="{{$data->email}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="status">
                            <option selected="selected">{{$data->status}}</option>
                            <option>True</option>
                            <option>False</option>
                        </select>
                    </div>
                </div>
                <div class="tab-pane" id="tab-smtp">
                    <div class="mb-3">
                        <label>Smtpserver</label>
                        <input type="text" name="smtpserver" value="{{$data->smtpserver}}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Spmtpemail</label>
                        <input type="text" name="spmtpemail" value="{{$data->spmtpemail}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Smtppassword</label>
                        <input type="password" name="smtppassword" value="{{$data->smtppassword}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Smtpport</label>
                        <input type="number" name="smtpport" value="{{$data->smtpport}}"
                               class="form-control">
                    </div>
                </div>
                <div class="tab-pane" id="tab-social">
                    <div class="mb-3">
                        <label>Facebook</label>
                        <input type="text" name="facebook" value="{{$data->facebook}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Instagram</label>
                        <input type="text" name="instagram" value="{{$data->instagram}}"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Twitter</label>
                        <input type="text" name="twitter" value="{{$data->twitter}}"
                               class="form-control">
                    </div>
                </div>
                <div class="tab-pane" id="tab-aboutus">
                    <div class="mb-3">
                        <label>About Us</label>
                        <textarea id="aboutus" type="text" name="aboutus">{{$data->aboutus}}></textarea>
                    </div>
                </div>
                <div class="tab-pane" id="tab-contact">
                    <div class="mb-3">
                        <label>Contact</label>
                        <textarea id="contact" type="text" name="contact">{{$data->contact}}></textarea>
                    </div>

                </div>
                <div class="tab-pane" id="tab-references">
                    <div class="mb-3">
                        <label>References</label>
                        <textarea id="references" type="text"
                                  name="references">{{$data->references}}></textarea>
                    </div>
                </div>


                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">


                                    <input type="hidden" id="id" name="id" value="{{$data->id}}" class="form-control">

                                    <script>
                                        $(document).ready(function () {
                                            $('#aboutus').summernote();
                                            $('#contact').summernote();
                                            $('#references').summernote();
                                        });
                                    </script>

                                    <button type="submit" class="btn btn-primary">Update Survey</button>
                                </form>
                            </div>
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
        <script
            src="{{asset('assets')}}/admin/cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/chart/chart.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/easing/easing.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/waypoints/waypoints.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/tempusdominus/js/moment.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="{{asset('assets')}}/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Template Javascript -->
        <script src="{{asset('assets')}}/admin/js/main.js"></script>

