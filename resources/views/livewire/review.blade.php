<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <form class="review form" wire:submit.prevent="store">
        @csrf
        <div class="reviews-submit" >
            <h4>Give your Review:</h4>
            @error('rate')<span class="text-danger">{{$message}}</span>@enderror
            <div  class="ratting">
                <input   type="radio" id="star5" wire:model="rate" value="5"/><label class="fa fa-star" for="star5"></label>
                <input   type="radio" id="star4" wire:model="rate" value="4"/><label class="fa fa-star" for="star4"></label>
                <input    type="radio" id="star3" wire:model="rate" value="3"/><label class="fa fa-star" for="star3"></label>
                <input    type="radio" id="star2" wire:model="rate" value="2"/><label class="fa fa-star" for="star2"></label>
                <input    type="radio" id="star1" wire:model="rate" value="1"/><label class="fa fa-star" for="star1"></label>
            </div>

            <div class="col-12">
                <input class="input" wire:model="subject" type="text" placeholder="Subject">
                @error('subject')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="col-12">
                <textarea class="input" wire:model="review" placeholder="Review"></textarea>
                @error('review')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="col-sm-7">
                @auth
                    <button type="submit" class="btn btn-success" value="Save">Submit</button>
                @else
                    <a href="/login" class="primary-btn">For Submit Review Please Login</a>
                @endauth
            </div>
        </div>
    </form>
    @livewireScripts
</div>
