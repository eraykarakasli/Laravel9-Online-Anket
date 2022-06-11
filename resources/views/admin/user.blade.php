@extends('layouts.admin')

@section('title', 'User List')



@section('content')

    <!-- survey blade-->
    <div class="container-fluid w-100 p-3">

        <div class="row w-100 p-3 ms-4 bg-light rounded align-items-center justify-content-center mx-0">

            <div class="col-md-8 text-left">
                <h3 class="card-title">Users</h3>

                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-md-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">

                                <table  class="table table-striped table-hover table-secondary">
                                    <thead  class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Roles</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datalist as $rs)
                                            <td> {{$rs->id}}</td>
                                            <td>@if($rs->profile_photo_path)
                                                    <img src="{{\Illuminate\Support\Facades\Storage::url($rs->profile_photo_path)}}" width="50">
                                                @endif</td>
                                            <td>{{$rs->name}}</td>
                                            <td>{{$rs->email}}</td>
                                            <td>{{$rs->phone}}</td>
                                            <td>{{$rs->address}}</td>
                                            <td>@foreach($rs->roles as $row)
                                                    {{$row->name}},

                                                    <a href="{{route('admin_user_roles',['id'=>$rs->id])}}"onclick="return !window.open(this.href,'','top=50 left=100 width=800 height=600')">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAkFBMVEVFjAD///9AigB6q1eGsWdknjFBiwB1plk4hgBZlyT+/vtinDZmnjtrokE8iAAxgwD0+O7h69mgwIqPtHQsgQDG2bjX5czr8uZ3qFFUlBzg7dWqx5WnxpDA1bH09+uwyJiDsGS40aSYvX/K3b+Ksm5OkA9+rVtbly3g6tq50ayhwomOuGuWvnhfmyhroEWiwZBv/NLyAAAIfUlEQVR4nO2d63qjOAyGjemkmqSxyRlK04SGDM3utr3/u1tDmubEyWBhMPP9m3mmhXdky7IsLGJhy1m97w7+NHTHH95+T4T23sfYDad+sHtfOejPJ4i/ezhZf7kRYRyAMUYpOYtS8TcAnJHIna4nQ8S3wCJ8PsyeKAdGByRfA8qA09Hs8Iz0JgiEw8nGhhiugO1SMSa4PoYxVRM6iwcPQAbuAhPA2y5Uz0ylhK+By4BVojtJ/LwbvKp8KXWEzvpzXtF4t6acfx7UQaoiXG4HSvBOkIPtUtGbKSF0NhGvNzjvxXi0UTIlFRBOQq7QfGdR4OGkBYTLPzV9S54YPNYerDUJl2OOYb6zKB/XZKxFuBwh8x0Zf9VirEE4sRvgSxjBrTEfKxM6IeL8u2cMK/vVioRDv0G+WAz8ijFrNcKlB43yxQKv2nSsQuiEDU3Aa1FeaahWIFw3PEDPYrBugNDZNj9Az4KttBllCXdElwGPYmSHSjiczbXyxZrP5JyqFOEq0jlCT4JohUW4kEq94ImyBQ7hG9eN9iP+hkDo2G0YoSeBXXoyliVcRXp96K1Y6clYknCCsouvIwolg7hyhIs2jdCToJy/KUUYtMfHXIoHqghf9C/z6Zq/qCGcttOCsfhUBeFbG+fgSVC8MBYStmidT1Px2l9EOG2zBWNB0UAtIHxptwVj8QJ3k08YtNWLXmoeVCdctN+CsXju0p9HuGz7HDwpN4DLIVx1BVAg5oTh2YRO1LZgO1s0yk5QZRPa7dou5YvZ8oStDmXulR3cZBF2xI2elelQMwhX3ZmDJ9EMb5NOOOyQlzmJRumpm3TCWbcm4VEwK0+460Kwdq95asI/jdDR/aqVlbYqphFu1a6EA5oqpc84im3LEa7VTsL9OF2e0qcclXa+eE/oqAWkf1L+X2M9YMRMcD9O7wlDtU+mWfEUCiELiwmXioOZZgkJv9tI3RIOPcUuoGFC6t2u+7eEvuq1vmFCAn4+oWI3Q5onvHM2N4SK3QzRQHjrbK4JJ+rj0cYJCVyX+V0TuuojjeYJqZtNqHqlSJ7XOOHNinFFOEIIFjUQ0lEWIYYJdRBeG/GScIxSca+BkH6mE6KYUAvhlREvCG2U3IwWQvqYRoiwFiYP00F4uSaeCdWHM4n0EF4ENj+EDlIKWA8h4T/R6Q/hBimBqIkQNneEWDlgTYQ0uiXEWSqINsLzgnEiVJxBPEsXIXu4JnSKPiqvLF2EZOBcESrOkV5IG+Epd/pN+Il21qSNkI4vCV/xjmK0EZL56wVhgHeapo8QggtChOzFSfoIv7MZCaGDGeZrIyTM+SHELOPWSHgsBE8I0ZZ7oteGDyfCIcZR3kkaCUlyhhETIu19j9JJmOyDY0KsjVMirYT+NyFOguZbOgmTZ8eEqMUzOgkJHAmfUUvYtBLy54TwYLANDwnhDDedoJOQzRLCJ9QqPa2E9CkmHCJfMKOTkAyGgnCCWyurl5BPBCFeAiORXkJYC8Iv3CfpJWRTQYi4+42ll1DsgokVoSUSj8/Q62kii2CXy+olJIJvhZ3U00vIVuQd+cMKzYT8neyQy/I1E8KOyMXd6SXbeQI3g3AL8r+sAuGB+DL/lftHeWV9kPRPhd+1lyZkPplKEA5+Z7xtU5Iv2mJTIlOgMPiNeS01DmFIZEKaDhJSl8iUenWRcEw+JP55BwkFn0y+u4uEHpFxwF0klFtg/hK2kVBOfwn/Euog3PfAl5q/Hpof05gfl5q/twjNJhT7Q7k9fvcIp1J5mi4S+kSmLLGDhHCQypd2kXAnlfPWnmuTP5Dn75LnFqNfsvr4N+Nt//uQ/l0jWb7k3ELu7IkOZJV5C9cWpH9XlZ2F04Pzwx6cAZt/jm9+LYb59TTm10SZX9fWg9pE8+tLza8RNr/Ouwe1+uZ/b2H+NzPmf/dk/rdrPfj+0PxvSM3/DrgH33Kb+T2+c0Fo5J0K3xd+9eZeDPPvNjH/fpoe3DFk/j1RPbjry/z72sy/c68H9yZaj6bffdmD+0txgtM23UHbg3uEzb8Lugf3eZtxJ/tN9Uff7tU3vzdCD/pbmN+jpAd9ZszvFdSDfk/Ke3Y1SliqZ5fi3GmjhOX6rinOLDZJWLZ3ntr+h43asGz/Q6U9LBvsnVe+h6XaPqT7p1Sp738o04dUbS9ZZfeUFDxGqpes+f2Ae9DTuQd9uXvQW71TnatplLYSFhFaq+6MU8jwMgWE1rIriHC3ZSpJ2BWHmulGiwmtoAstyOdBLkM+ofXSfivyl3yEAkJr2va5CNMCgiJC663dVuSZK31pwnYHN9mhjAShNW2vFXnREC1HaL201aPOC5xMaUIraKcVeVDm5UsRohaCVxbkLvSShCKAa1sYTm8O0eoSWquoXZspFuUE25UIraHdppEKdvZ2qSphq9b+4nW+EqG1UJ8gqyRKy/kYeUIxGdswUqH0FJQntIYz/Yv/fCZ3hYwcoWXtiF6fykhq6l4hoeVsdY5U2Jb2oZUJ4/NFXWZkaeeDCISW88B1OFXKQ2kDViQUQZzX/FAFLy+jpprQGvoND1UGfsVbuCoSiqEaNshIodIArUdoWRO7oelIuVtyH6GYUEzHUQOMlI+qTUAVhIJxjMxI+bgWX21CwfgHcT4ysGvyKSAU8zHkKBkACjysMf8UEgq/uom4akMyHm0q+89LKSEUWj4MFBqSwmBbe3h+SxWhMOT6c64EUozOz7US8yVSRyj0Grispt8RP+8GrypfSimhkLN48KCiKSmAt12os95RqgmFhhPfBg5MBpMy8RP2ZoJwAywCYaLnw+yJxphFn8EPYjg6mh2ekd4EizDWcLL+siPh9wEYu65kE39iDECsMZH9tcYw3Y8wCY9yVu+7gz8N3fGHt0/6FOy9j7EbTv1g975SPevu9T/hrKl1lLoWfQAAAABJRU5ErkJggg==" width="20px"> </a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('admin_user_edit', ['id'=>$rs->id])}}">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_user_delete', ['id'=> $rs->id])}}" onclick="return confirm('Delete !! are you sure?')" >Delete</a>
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

