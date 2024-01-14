<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;

class DestroyCartItemsComponent extends Component
{

    public function removeAll(){
        $this->emit('removeAll' );
    }

    public function render()
    {
        return view('livewire.frontend.cart.destroy-cart-items-component');
    }
}
