@php
    $parentCategories = \App\Http\Controllers\HomeController::categoryList()
@endphp
<div class="navbar navbar-expand-md bg-dark navbar-dark ">
    <ul class="nav nav-tabs">
        <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Surveys</a>
            @foreach($parentCategories as $rs)
            <div class="dropdown-menu">
                <a class="dropdown-item">{{$rs->title}}</a>
                @if(count($rs->children))
                    @include('home.categorytree',['children'=>$rs->children])
                @endif

            </div>
            @endforeach
        </li>
        <li class="nav-item bg-dark">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item bg-dark">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
    </ul>

</div>
<!-- Nav Bar End -->
