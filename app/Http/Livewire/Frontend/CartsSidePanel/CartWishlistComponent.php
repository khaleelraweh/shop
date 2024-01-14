<?php

namespace App\Http\Livewire\Frontend\CartsSidePanel;

use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartWishlistComponent extends Component
{
    use LivewireAlert;
    public $wishlists;

    protected $listeners = [
        'updateCart' => 'mount'
    ];

    public function mount(){
        $this->refreshwishlist();
    }

    public function refreshwishlist(){
        $this->wishlists = Cart::instance('wishlist')->content();
    }
    
    public function render()
    {
        return view('livewire.frontend.carts-side-panel.cart-wishlist-component');
    }
}
