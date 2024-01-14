<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistItemComponent extends Component
{
    public $item;
    public $item_quantity = 1;

    public function mount(){

         $this->item_quantity = Cart::instance('wishlist')->get($this->item)->qty ?? 1;
        
    }


    public function removeFromWishList($rowId){
         $this->emit('removeFromWishList' , $rowId );
    }
 
    public function moveToCart($rowId){
        $this->emit('moveToCart' , $rowId);
    }


    public function render()
    {
        return view('livewire.frontend.wishlist.wishlist-item-component',[
            'wishListItem' =>Cart::instance('wishlist')->get($this->item)
        ]);
    }
    
} 
