@php
    $parentCategories = \App\Http\Controllers\HomeController::categoryList()
@endphp
<div class="container-fluid ">
    <ul class="nav nav-tabs ">
        <li class="nav-item navbar-dark">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#ui-basic" aria-expanded="true" >
                <span class="menu-title"><i class=""></i>Categories</span>
                <ul class="category-list ">
                    @foreach($parentCategories as $rs)
                </ul>
                <br>
            </a>
            <div class="collapse" id="ui-basic">
                <ul>
                    <li class="nav-item ">
                        <a class="nav-link " href="#">{{$rs->title}}</a>
                        <div class="custom-menu">
                            <div class="row">
                                @if(count((array)$rs->children))
                                    <ul class="navbar-dark ">
                                        @include('home.categorytree',['children'=>$rs->children])
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </li>
    </ul>
</div>

<!-- Nav Bar End -->
