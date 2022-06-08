

<!-- Bottom Bar Start -->
<div class="bottom-bar bg-light">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="/">
                        <img src="{{asset('assets')}}/img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="search">
                    <form action="{{route('getsurvey')}}" method="post">
                        @csrf
                        @livewire('search')
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    @section('javascript')
                        @livewireScripts
                    @endsection
                </div>
            </div>

            <div class="col-sm-5">

                @auth
                    <div class="user">
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('myprofile')}}">Profile</a>

                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="user bg-light">
                        <button type="button" class="btn" >
                            <a href="register">Register</a> / <a href="login"> Log in</a>
                        </button>

                    </div>
                @endguest
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

</div>
