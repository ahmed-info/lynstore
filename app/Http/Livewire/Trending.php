<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;

class Trending extends Component
{
    public function render()
    {
        return view('livewire.trending',[
                'trendings'=> Product::orderBy('id','DESC')->limit(10)->get()

            ]);
    }
}
