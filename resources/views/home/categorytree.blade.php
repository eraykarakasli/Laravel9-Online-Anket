@foreach($children as $subcategory)

    @if(count($subcategory->children))

        <li ><a href="#" class="nav-link">{{$subcategory->title}}</a> </li>
            <ul class="navbar-dark">
        @include('home.categorytree',['children'=>$subcategory->children])
            </ul>
            <hr>
     @else
        <li><a href="{{route('categorysurveys',['id'=>$subcategory->id, 'slug'=>$subcategory->title])}}" class="nav-link">{{$subcategory->title}}</a> </li>
     @endif

@endforeach
