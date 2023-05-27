<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Carts extends Component
{
    public $cartCount;
    public $wishlistCount;
    public function mount()
    {
        //$this->cartCount = Cart::instanse('default')->count();
        //$this->wishlistCount = Cart::instanse('wishlist')->count();
    }
    public function render()
    {
        return view('livewire.carts');
    }
}
