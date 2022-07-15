<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Index extends Component
{
    public $types = [
        'development',
        'cart',
    ];

    public function render()
    {
        return view('livewire.cart.index');
    }
}
