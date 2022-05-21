<?php

namespace App\Http\Livewire;

use App\Models\Survey;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $datalist = Survey::where('title','like','%'.$this->search.'%')->get();
        return view('livewire.search',['datalist' => $datalist,'query'=>$this->search]);
    }
}
