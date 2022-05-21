<div>
    <input wire:model="search" name="search" type="text" class="input search-input" list="mylist" placeholder="Search Survey..." />

    @if(!empty($query))
        <datalist id="mylist">
            @foreach($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}}</option>
            @endforeach
        </datalist>
    @endif
</div>
